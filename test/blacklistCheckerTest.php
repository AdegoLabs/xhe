<?php

$container = require(__DIR__ . '/../app/bootstrap.php');

$app = new Silly\Application();
$app->useContainer($container, $injectWithTypeHint = true);

$invoker = new Invoker\Invoker(null, $container);

$app->command('test:test [ip] [port]', function($ip, $port) use (&$container, &$invoker) {
	$container->set('client', \DI\create('Xhe\Client')->constructor($ip, $port));
	
	$proxies = App\Model\Proxy::where('status', 1)::get();
	
	foreach($proxies as $proxy) {
		$invoker->call('App\Command\EnableProxy', [
			'ip' => $proxy->ip,
			'port' => $proxy->port,
			'login' => $proxy->login,
			'pass' => $proxy->password
		]);
		
		if (!$invoker->call('App\Command\MXToolboxCheckIp', ['ip' => $proxy->ip])) {
			$proxy->status = 2;
			$proxy->save();
			printf("Hostname %s was listed in blacklist!\n", $proxy->ip);
		} else {
			printf("Hostname %s is clean!\n", $proxy->ip);
		}
	}
});

$app->run();