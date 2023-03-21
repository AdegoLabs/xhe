<?php

$container = require(__DIR__ . '/../app/bootstrap.php');

$app = new Silly\Application();
$app->useContainer($container, $injectWithTypeHint = true);

$invoker = new Invoker\Invoker(null, $container);

$app->command('google:login [ip] [port]', function($ip, $port) use (&$container, &$invoker) {
	$container->set('client', \DI\create('Xhe\Client')->constructor($ip, $port));
	$controller = (new App\Controller\GoogleAccountController());
	
	if ($account = App\Model\GoogleAccount::where('id', 2848)::getOne())
		$controller->set($account);
	else die('No accounts...');
	
	$invoker->call('App\Method\GoogleLogin', [$controller]);
	$invoker->call('App\Method\GooglePlaygroundLogin', [$controller]);
	
});

$app->run();