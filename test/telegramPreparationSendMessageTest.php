<?php

	if (!file_exists('madeline.php'))
		copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
	include 'madeline.php';

	use danog\MadelineProto\Settings\Connection;
	use danog\MadelineProto\Stream\Proxy\HttpProxy;
	use MadeITBelgium\Spintax\Spintax as Spintax;
	use Psr\Log\LoggerInterface;

	$container = require(__DIR__ . '/../app/bootstrap.php');

	$app = new Silly\Application();
	$app->useContainer($container, $injectWithTypeHint = true);

	$invoker = new Invoker\Invoker(null, $container);
	
	/*
	$_POST['message'] = "Это тестовое сообщение длинной в 333 символа для проверки ограничений Telegram. В данном сообщении содержатся такие стоп-слова как: казино, онлайн казино, casino, deposit, депозит, деньги, гривны, рубли, игровые автоматы, слоты, играть бесплатно в автоматы, джекпот, бездепозит, бонусы, выигрыш, азартные игры, фриспины, freespins.";
	$_POST['message'] = "{Без паники|Это тест!|Hello World!|I AM WIZZARD!!!}";
	$_POST['limit'] = 100;
	*/
	
	$targetPhonesFile = (VAR_DIR . DIRECTORY_SEPARATOR . 'tasks' . DIRECTORY_SEPARATOR . 'target-numbers.in');
	$targetPhones = file($targetPhonesFile, FILE_IGNORE_NEW_LINES);
	$message = file_get_contents(VAR_DIR . DIRECTORY_SEPARATOR . 'messages' . DIRECTORY_SEPARATOR . 'tg_gd0107.txt');
	$limit = 45;
	
	/*
	if (isset($_POST['target']) && !is_array($_POST['target'])) {
		if (strstr($_POST['target'], ",")) {
			$targetPhones = explode(",", $_POST['target']);
		} elseif(strstr($_POST['target'], "\r\n")) {
			$targetPhones = explode("\r\n", $_POST['target']);
		} elseif(strstr($_POST['target'], "<br>")) {
			$targetPhones = explode("<br>", $_POST['target']);
		} elseif(strstr($_POST['target'], "\n")) {
			$targetPhones = explode("\n", $_POST['target']);
		} else {
			$targetPhones = [$_POST['target']];
		}
	} elseif (is_array($_POST['target'])) {
		$targetPhones = $_POST['target'];
	} else {
		die("No target phones specified!");
	}*/
	/*
	if (isset($_POST['message']) && $_POST['message']) {
		$message = $_POST['message'];
	} else {
		die("No message specified!");
	}
	*/
	
	if (preg_match("#{#", $message) && preg_match("#\\|#", $message) && preg_match("#}#", $message)) {
		$useSpintax = true;
		
		printf("Enabled spintax using!\n");
	} else {
		$useSpintax = false;
	}
	
	$sourceMessage = $message;
	
	/*
	if (isset($_POST['limit']) && $_POST['limit']) {
		$limit = (int) $_POST['limit'];
	} else {
		$limit = 100;
	}
	*/

	$app->command('test:test [ip] [port] [--rt]', function($ip, $port, $rt, LoggerInterface $logger) use(&$invoker, &$container, &$targetPhones, &$targetPhonesFile, &$message, &$limit, &$useSpintax, &$sourceMessage) {
		$container->set('client', \DI\create('Xhe\Client')->constructor($ip, $port));
		
		switch($ip) {
			case '127.0.0.1' : launchXhe(($rt ? XHE_EXE_RT : XHE_EXE), $port);
			default: remoteXheLaunch(($rt ? XHE_EXE_RT : XHE_EXE), $ip, '8000', $port);
		}
		
		$container->get('debug')->set_cur_script_path(__DIR__);
		
		while ($phoneModel = App\Model\TelegramPhone::where('status', 1)::where('working', 0)::groupBy('used')::getOne()) {
			$controller = new App\Controller\TelegramPhoneController;
			$controller->set($phoneModel);
			
			if (!$controller->hasProxy()) {
				$proxy = \App\Model\ProxyBuilder::findUnused();
				
				if (!is_null($proxy)) {
					$model = $controller->get();
					$model->proxy = $proxy;
					$controller->set($model);
					$controller->update(['proxyId' => $proxy->id]);
					$proxy->used += 1;
					$proxy->save();
					
					unset($model);
					$logger->info("Proxy was binded.");
				}
			} else {
				$proxy = $phoneModel->proxy;
				$logger->info("Proxy was retrieved.");
			}
			
			$controller->startWorking();
			
			$telegramDataDir = VAR_DIR . DIRECTORY_SEPARATOR . 'numbers' . DIRECTORY_SEPARATOR . $controller->getPhone() . DIRECTORY_SEPARATOR . 'tdata';
			
			$logger->info("Telegram data dir is " . $telegramDataDir);
			
			if (!file_exists($telegramDataDir)) {
				die("Can not find folder with phone data " . $controller->getPhone() . "...;(\n");
			}
			
			$container->get('filesystem')->remove('C:\Telegram\tdata');
			$container->get('filesystem')->mirror($telegramDataDir, 'C:\Telegram\tdata');
			
			$logger->info("Telegram data was replaced");
			
			launchTelegram();
			sleep(3);
			
			$tg = $this->container->get('window')->get_by_text("Telegram", false);		
			
			/*$tg->enable(true);
			$tg->focus();
			$tg->restore();
			$tg->show();
			$tg->foreground();
			*/
			$tg->maximize();
			usleep(1200);
			$tg->maximize();
			
			$logger->info("Telegram was launched.");
			
			$invoker->call(App\Command\TelegramProxyInit::class, [
				"ip" => $proxy->ip,
				"port" => $proxy->port,
				"login" => $proxy->login,
				"password" => $proxy->password,
			]);
			
			if (is_null($controller->getAppId()) || is_null($controller->getAppHash())) {
				$logger->info("Creating app...");
				if ($invoker->call(App\Command\EnableProxy::class, [
					'ip' => $proxy->ip,
					'port' => $proxy->port,
					'login' => $proxy->login,
					'pass' => $proxy->password
				]))
				$logger->info("Proxy was inited.");
				
				$createdApp = $invoker->call(App\Command\TelegramCreateWebApp::class, [
					'phone' => $controller->getPhone()
				]);
				
				if (isset($createdApp['id'])) {
					$controller->setAppId($createdApp['id']);
				}
				
				if (isset($createdApp['hash'])) {
					$controller->setAppHash($createdApp['hash']);
				}
				
				if (isset($createdApp['id']) && isset($createdApp['hash'])) {
					$logger->info("App was created successfully!");
					$logger->info("App credentials are:\nApp id: " . $controller->getAppId() . "\nApp hash: " . $controller->getAppHash());
				}
			}
			
			sleep(5);
			
			$logger->info("Initialising API calls...\n");
			
			$settings['app_info']['api_id'] = $controller->getAppId();
			$settings['app_info']['api_hash'] = $controller->getAppHash();
			$settings['connection_settings']['all']['proxy'] = '\HttpProxy';
			$settings['connection_settings']['all']['proxy_extra'] = [
				'address' => $proxy->ip, 
				'port' => $proxy->port, 
				'username' => $proxy->login, 
				'password' => $proxy->password
			];

			$MadelineProto = new \danog\MadelineProto\API('session.' . str_replace('+', '', $controller->getPhone()), $settings);
			$MadelineProto->phoneLogin($controller->getPhone());
			
			$logger->info("Getting confirmation code from Telegram...");
			
			sleep(10);
			
			if (!$phoneCode = $invoker->call(App\Command\TelegramGetConfirmationCode::class)) {
				die("Can not get confirmation code ;(\n");
				$logger->error("Can not get confirmation code ;(");
			}
			
			$logger->info("Confirmation code is " . $phoneCode);
			
			if ($authorization = $MadelineProto->completePhoneLogin($phoneCode)) {
				$logger->info("Authorization as " . $controller->getPhone() . " was completed!");
			} else {
				$logger->error("Error during authorization as " . $controller->getPhone());
			}
		
			/* Telegram API limits: 1 message per second to individual chat
									~100 messages per account
			*/
			
			$iterationK = 0;
			while(!empty($targetPhones)) {
				if ($iterationK > $limit) {
					$logger->info("Reaching the limit of " . $limit . " messages per account!");
					break;
				}
				
				if ($useSpintax) {
					$message = $container->get('spintax')->process($sourceMessage);
				}
				
				$contactPhone = str_replace("+", "", rtrim(trim(App\Classes\CutLastString::cut($targetPhonesFile))));
				
				if (!$contactPhone)
					die("No contact phones found");
				
				$logger->info("Trying to send message to " . $contactPhone);
				
				$contact = ['_' => 'inputPhoneContact', 'client_id' => 0, 'phone' => $contactPhone, 'first_name' => $container->get('submitter')->generate_random_name("ru", "man"), 'last_name' => $container->get('submitter')->generate_random_second_name("ru", "man")];
				$import = $MadelineProto->contacts->importContacts(['contacts' => [$contact]]);
				
				sleep(7);
				
				if (!isset($import['imported'][0])) {
					$logger->error("Unable to create contact and send message to +" . $contactPhone . ";(");
					$iterationK += 1;
					sleep(8);
					continue;
				}
				
				$logger->info("Contact was imported.");
				$contactId = $import['imported'][0]['user_id'];
				printf("The message is:\n%s\n", $message);
				
				if ($MadelineProto->messages->sendMessage(['peer' => $contactId, 'message' => $message], 15000000))
					$logger->info("Message for +" . $contactPhone . " was sent successfully! Salut!");
				else $logger->error("Unsuccessfull attempt to send message to " . $contactPhone . " ;(");
				
				$iterationK += 1;
				sleep(10);
				$MadelineProto->closeConnections();
				
				if (!$MadelineProto->isClosed())
					$MadelineProto->close();
			}
			
			exitTelegram();
			
			$logger->info("Telegram was closed!");
			
			$controller->used();
			$controller->finishWorking();
			
			$container->get('browser')->navigate('about:blank');
			$container->get('browser')->wait();
			
			sleep(2);
		}
	});
	
	$app->run();
?>