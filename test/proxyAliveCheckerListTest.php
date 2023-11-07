<?php

$container = require(__DIR__ . '/../app/bootstrap.php');

$app = new Silly\Application();
$app->useContainer($container, $injectWithTypeHint = true);
$invoker = new Invoker\Invoker(null, $container);

$app->command('test:test [ip] [port] [file]', function($ip, $port, $file)  use (&$container, &$invoker) {
	$container->set('client', \DI\create('Xhe\Client')->constructor($ip, $port));
	if (!file_exists($file))
		die('File doesn\'t exist!');
	
	$data = file($file, FILE_IGNORE_NEW_LINES);
	$working = [];
	$notWorking = [];
	
	foreach($data as $row) {
		$cols = explode(":", $row);
		$proxyIp = trim(rtrim($cols[0]));
		$proxyPort = trim(rtrim($cols[1]));
		$proxyLogin = trim(rtrim($cols[2]));
		$proxyPassword = trim(rtrim($cols[3]));
		
		$invoker->call(\App\Command\DisableProxy::class);
		$invoker->call(\App\Command\EnableProxy::class, ['ip' => $proxyIp, 'port' => $proxyPort, 'login' => $proxyLogin, 'pass' => $proxyPassword]);
		
		if (!$invoker->call(\App\Command\IsWebpageAvailable::class, ['http://example.com/'])) {
			array_push($notWorking, $proxyIp);
			printf("Proxy %s:%d is NOT active!\n", $proxyIp, $proxyPort);
		} else {
			array_push($working, $proxyIp);
			printf("Proxy %s:%d is active!\n", $proxyIp, $proxyPort);
		}
	}
	
	$fw1 = fopen($outputWorking = 'C:\xampp\htdocs\xhe\var\proxycheck\proxyWorking.txt', "w");
	fwrite($fw1, implode("\n", $working));
	fclose($fw1);
	
	$fw2 = fopen($outputNotWorking = 'C:\xampp\htdocs\xhe\var\proxycheck\proxyNotWorking.txt', "w");
	fwrite($fw2, implode("\n", $notWorking));
	fclose($fw2);
});

$app->run();
?>