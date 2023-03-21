<?php

$container = require(__DIR__ . '/../app/bootstrap.php');

$app = new Silly\Application();
$app->useContainer($container, $injectWithTypeHint = true);

$invoker = new Invoker\Invoker(null, $container);

$app->command('test:test [ip] [port]', function($ip, $port) use (&$container, &$invoker) {
	$container->set('client', \DI\create('Xhe\Client')->constructor($ip, $port));
	$controller = (new App\Controller\GoogleAccountController());
	$container->get('debug')->set_cur_script_path(__DIR__);
	
	if (!$account = App\Model\GoogleAccountBuilder::findUnused()) die('No accounts...');
	else $controller->set($account);
	
	
	$invoker->call('App\Method\GoogleLogin', [$controller]);
	
	$invoker->call('App\Command\GoogleCreateProjectAndAPI');
});

$app->run();