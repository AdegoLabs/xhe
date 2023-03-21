<?php


	$container = require(__DIR__ . '/../app/bootstrap.php');

	$app = new Silly\Application();
	$app->useContainer($container, $injectWithTypeHint = true);
	$invoker = new Invoker\Invoker(null, $container);

	$app->command("test:test [ip] [port] [--rt]", function($ip, $port, $rt) use (&$container, &$invoker){
		$proxyIp = "91.107.119.81";
		$proxyPort = "45785";
		$proxyLogin = "Selyansolo2021";
		$proxyPassword = "E3k2LiP";

		$container->set('client', \DI\create('Xhe\Client')->constructor($ip, $port));
		
		switch($ip) {
			case '127.0.0.1' : launchXhe(($rt ? XHE_EXE_RT : XHE_EXE), $port);
			default: remoteXheLaunch(($rt ? XHE_EXE_RT : XHE_EXE), $ip, '8000', $port);
		}
		
		$container->get('debug')->set_cur_script_path(__DIR__);
		
		//$container->get('browser')->set_default_authorization($proxyLogin, $proxyPassword);
		//$container->get('connection')->enable_proxy("all connections", $proxyIp . ":" . $proxyPort);
		$container->get('connection')->disable_proxy("all connections");
		
		$container->get('browser')->navigate("https://2ip.ru");
		sleep(150);
	});
	
	$app->run();