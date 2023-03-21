<?php
	$container = require(__DIR__ . '/../app/bootstrap.php');

	$app = new Silly\Application();
	$app->useContainer($container, $injectWithTypeHint = true);

	$invoker = new Invoker\Invoker(null, $container);

	$app->command('test:test [ip] [port] [--rt]', function($ip, $port, $rt) use (&$invoker, &$container) {
		$proxyIp = '91.228.239.232';
		$proxyPort = 45785;
		$login = "Selyansolo2021";
		$password = "E3k2LiP";
		
		$container->set('client', \DI\create('Xhe\Client')->constructor($ip, $port));
		$container->get('debug')->set_cur_script_path(__DIR__);
		
		$invoker->call(App\Command\TelegramProxyInit::class, [
			"ip" => $proxyIp,
			"port" => $proxyPort,
			"login" => $login,
			"password" => $password,
		]);
	});
	
	$app->run();