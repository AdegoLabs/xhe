<?php

$container = require(__DIR__ . '/../app/bootstrap.php');

$app = new Silly\Application();
$app->useContainer($container, $injectWithTypeHint = true);
$invoker = new Invoker\Invoker(null, $container);

$app->command('test:test [ip] [port]', function($ip, $port)  use (&$container, &$invoker) {
	$container->set('client', \DI\create('Xhe\Client')->constructor($ip, $port));
	
	while(TRUE) {
		$container->get('mouse')->move(rand(0,250), rand(0,250));
		$container->get('browser')->wait();
		sleep(15);
	}
	
});

$app->run();