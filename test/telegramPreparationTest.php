<?php
	$container = require(__DIR__ . '/../app/bootstrap.php');

	$app = new Silly\Application();
	$app->useContainer($container, $injectWithTypeHint = true);

	$invoker = new Invoker\Invoker(null, $container);

	$app->command('test:test [ip] [port] [--rt]', function($ip, $port, $rt) use(&$invoker, &$container) {
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
					printf("Proxy was binded.\n");
				}
			} else {
				$proxy = $phoneModel->proxy;
				printf("Proxy was retrieved.\n");
			}
			
			printf("Proxy ID is %d\n", $proxy->id);
			
			$phoneModel->working = 1;
			$phoneModel->save();
			
			$telegramDataDir = VAR_DIR . DIRECTORY_SEPARATOR . 'numbers' . DIRECTORY_SEPARATOR . $phoneModel->phone . DIRECTORY_SEPARATOR . 'tdata';
			
			printf("Telegram data dir is %s\n", $telegramDataDir);
			
			if (!file_exists($telegramDataDir))
				die("Can not find folder with phone data " . $phoneModel->phone . "...;(\n");
			
			$container->get('filesystem')->remove('C:\Telegram\tdata');
			$container->get('filesystem')->mirror($telegramDataDir, 'C:\Telegram\tdata');
			
			printf("Telegram data was replaced.\n");
			
			launchTelegram();
			sleep(2);
			
			$tg = $this->container->get('window')->get_by_text("Telegram", false);		
			$tg->enable(true);
			$tg->focus();
			$tg->restore();
			$tg->show();
			$tg->foreground();
			$tg->maximize();
			usleep(200);
			$tg->maximize();
			
			printf("Telegram was launched.\n");
						
			$invoker->call(App\Command\EnableProxy::class, [
				'ip' => $proxy->ip,
				'port' => $proxy->port,
				'login' => $proxy->login,
				'pass' => $proxy->password
			]);
			
			printf("Proxy was inited.\n");
						
			if (is_null($phoneModel->appId) || is_null($phoneModel->appHash)) {
				printf("Creating app...\n");
				//$container->get('browser')->navigate('https://my.telegram.org/apps');
				$createdApp = $invoker->call(App\Command\TelegramCreateWebApp::class, [
					'phone' => $phoneModel->phone
				]);
				
				if ($createdApp['id']) {
					$controller->setAppId($createdApp['id']);
				}
				
				if ($createdApp['hash']) {
					$controller->setAppHash($createdApp['hash']);
				}
				
				if (isset($createdApp['id']) && isset($createdApp['hash']))
					printf("App was created successfully!\n");
			}
			
			/*
			if ($phoneModel->used < 1)
			$invoker->call(App\Command\TelegramProxyInit::class, [ // Do only Once!!!!
				'ip' => $proxyModel->ip,
				'port' => $proxyModel->port,
				'login' => $proxyModel->login,
				'password' => $proxyModel->password
			]);
			*/
			
			sleep(3);
			
			exitTelegram();
			
			printf("Telegram was closed.\n");
			
			$phoneModel->used += 1;
			$phoneModel->working = 0;
			$phoneModel->save();
			
			printf("Iteration finished!\n");
			
			$container->get('browser')->navigate('about:blank');
			$container->get('browser')->wait();
			
			for ($t = 10; $t > 1; $t--) {
				printf("Sleeping for %d seconds...\n", $t);
				sleep(1);
			}
		}
	});
	
	$app->run();
?>