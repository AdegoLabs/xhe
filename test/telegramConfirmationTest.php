<?php

	$container = require(__DIR__ . '/../app/bootstrap.php');

	$app = new Silly\Application();
	$app->useContainer($container, $injectWithTypeHint = true);
	$invoker = new Invoker\Invoker(null, $container);

	$app->command("test:test [ip] [port] [--rt]", function ($ip, $port, $rt) use (&$container, &$invoker) {
		$container->set('client', \DI\create('Xhe\Client')->constructor($ip, $port));
		
		switch($ip) {
			case '127.0.0.1' : launchXhe(($rt ? XHE_EXE_RT : XHE_EXE), $port);
			default: remoteXheLaunch(($rt ? XHE_EXE_RT : XHE_EXE), $ip, '8000', $port);
		}
		
		$container->get('debug')->set_cur_script_path(__DIR__);
		
		$code = $invoker->call(App\Command\TelegramGetConfirmationCode::class);
		
		printf("Confirmation code - %s\n", $code);
		
	});
	
	$app->run();
	
?>