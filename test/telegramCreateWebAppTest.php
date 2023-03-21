<?php

	$container = require(__DIR__ . '/../app/bootstrap.php');

	$app = new Silly\Application();
	$app->useContainer($container, $injectWithTypeHint = true);

	$invoker = new Invoker\Invoker(null, $container);

	$app->command("test:test [ip] [port] [phone] [--rt]", function($ip, $port, $rt, $phone) use(&$container, &$invoker) {
		$container->set('client', \DI\create('Xhe\Client')->constructor($ip, $port));
		
		switch($ip) {
			case '127.0.0.1' : launchXhe(($rt ? XHE_EXE_RT : XHE_EXE), $port);
			default: remoteXheLaunch(($rt ? XHE_EXE_RT : XHE_EXE), $ip, '8000', $port);
		}
		sleep(5);
		
		$proxyIp = '91.228.239.232';
		$proxyPort = 45785;
		$login = "Selyansolo2021";
		$password = "E3k2LiP";
		
		$container->get('debug')->set_cur_script_path(__DIR__);
		$invoker->call(App\Command\EnableProxy::class, [
			'ip' => $proxyIp,
			'port' => $proxyPort,
			'login' => $login,
			'pass' => $password
		]);
		
		$container->get('browser')->navigate('https://my.telegram.org/apps');
		
		$createdApp = $invoker->call(App\Command\TelegramCreateWebApp::class, [
			'phone' => $phone
		]);
		
		var_dump($createdApp);
	});
	
	$app->run();
?>