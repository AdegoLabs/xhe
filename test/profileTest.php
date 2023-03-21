<?php

$container = require(__DIR__ . '/../app/bootstrap.php');

$app = new Silly\Application();
$app->useContainer($container, $injectWithTypeHint = true);

$invoker = new Invoker\Invoker(null, $container);

$app->command('test:test [ip] [port]', function($ip, $port) use (&$container, &$invoker) {
	$container->set('client', \DI\create('Xhe\Client')->constructor($ip, $port));

	$account = App\Model\GoogleAccount::where('id', 2848)::getOne();
	$proxy = App\Model\Proxy::where('id', $account->proxyId)::getOne();
	$profile = App\Model\Profile::where('id', $account->profileId)::getOne();
	
	$profileController = new \App\Controller\ProfileController($profile);
	
	$container->get('App\Command\BrowserSettings')->initProfile([
			'useragent' => $profileController->getUseragent(), 
			'language' => $profileController->getLanguage(),
			'timezone' => $profileController->getTimezone(),
			'canvas' => $profileController->getCanvas(),
			'resolution' => $profileController->getResolution(),
			'hardware' => $profileController->getHardware(),
			'audio' => $profileController->getAudio(),
			'bound' => $profileController->getBound()
	]);
	$container->get('App\Command\BrowserSettings')->initProxy($proxy->ip, $proxy->port, $proxy->login, $proxy->password);
	
	$container->get('browser')->navigate('https://localhost/dashboard/');

	$container->get('browser')->navigate('https://f.vision/');
	$container->get('browser')->wait();
});

$app->run();