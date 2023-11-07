<?php

$container = require(__DIR__ . '/../app/bootstrap.php');

$app = new Silly\Application();
$app->useContainer($container, $injectWithTypeHint = true);
$invoker = new Invoker\Invoker(null, $container);

$proxies = App\Model\Proxy::where('status', 0, '>')::get();
$container->set('client', \DI\create('Xhe\Client')->constructor('127.0.0.1', 7667));

foreach($proxies as $proxy) {
	$invoker->call(\App\Command\DisableProxy::class);
	
	$invoker->call(\App\Command\EnableProxy::class, ['ip' => $proxy->ip, 'port' => $proxy->port, 'login' => $proxy->login, 'pass' => $proxy->password]);
	
	if (!$invoker->call(\App\Command\IsWebpageAvailable::class, ['https://developers.google.com/oauthplayground/'])) {
		printf("Proxy %s:%d is NOT active!\n", $proxy->ip, $proxy->port);
		$proxy->status = 0;
		$proxy->save();
	} else {printf("Proxy %s:%d is active!\n", $proxy->ip, $proxy->port);}
}

$app->run();
?>