<?php
	if (!file_exists('madeline.php')) {
		copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
	}

	include 'madeline.php';

	use danog\MadelineProto\Settings\Connection;
	use danog\MadelineProto\Stream\Proxy\HttpProxy;

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
		
		$proxyIp = "91.228.239.232";
		$proxyPort = 45785;
		$proxyLogin = "Selyansolo2021";
		$proxyPassword = "E3k2LiP";

		$message = "Greetings";
		$contactPhone = '380992209347';

		$apiId = 16414596;
		$apiHash = "584ae333a0319147d86e5fad4c125791";
		$phone = "+380668635014";

		$settings['app_info']['api_id'] = $apiId;
		$settings['app_info']['api_hash'] = $apiHash;
		$settings['connection_settings']['all']['proxy'] = '\HttpProxy';
		$settings['connection_settings']['all']['proxy_extra'] = [
			'address' => $proxyIp, 
			'port' => $proxyPort, 
			'username' => $proxyLogin, 
			'password' => $proxyPassword
		];

		$MadelineProto = new \danog\MadelineProto\API('session.madeline20', $settings);
		
		$MadelineProto->phoneLogin($phone);

		printf("Confirmation code was sent...\n");
		sleep(7);

		$phoneCode = $invoker->call(App\Command\TelegramGetConfirmationCode::class);
		var_dump($phoneCode);
		if (!$authorization = $MadelineProto->completePhoneLogin($phoneCode)) {
			printf("Error during authorization as %s\n", $phone);
		}

		printf("Authorization was completed!\n");

		$contact = ['_' => 'inputPhoneContact', 'client_id' => 0, 'phone' => $contactPhone, 'first_name' => 'Ivan', 'last_name' => 'Stepanov'];
		$import = $MadelineProto->contacts->importContacts(['contacts' => [$contact]]);
		$contactId = $import['imported'][0]['user_id'];

		if ($MadelineProto->messages->sendMessage(['peer' => $contactId, 'message' => $message]))
			printf("Message was sent successfully!\n");
	});
	
	$app->run();