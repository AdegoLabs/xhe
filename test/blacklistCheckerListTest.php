<?php

$container = require(__DIR__ . '/../app/bootstrap.php');

$app = new Silly\Application();
$app->useContainer($container, $injectWithTypeHint = true);

$invoker = new Invoker\Invoker(null, $container);

$app->command('test:test [ip] [port] [file]', function($ip, $port, $file) use (&$container, &$invoker) {
	$container->set('client', \DI\create('Xhe\Client')->constructor($ip, $port));
	
	if (!file_exists($file))
		die('File doesn\'t exist!');
	
	$data = file($file, FILE_IGNORE_NEW_LINES);
	
	foreach($data as $row) {
		$cols = explode(":", $row);
		$proxyIp = trim(rtrim($cols[0]));
		$proxyPort = trim(rtrim($cols[1]));
		$proxyLogin = trim(rtrim($cols[2]));
		$proxyPassword = trim(rtrim($cols[3]));
		
		$invoker->call(\App\Command\DisableProxy::class);
		$invoker->call('App\Command\EnableProxy', [
			'ip' => $proxyIp,
			'port' => $proxyPort,
			'login' => $proxyLogin,
			'pass' => $proxyPassword
		]);
		
		if (!$invoker->call('App\Command\MXToolboxCheckIp', ['ip' => $proxyIp])) {
			printf("Hostname %s was listed in blacklist!\n", $proxyIp);
		} else {
			printf("Hostname %s is clean!\n", $proxyIp);
		}
	}
});

$app->run();