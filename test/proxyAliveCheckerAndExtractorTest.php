<?php

	$container = require(__DIR__ . '/../app/bootstrap.php');

	$app = new Silly\Application();
	$app->useContainer($container, $injectWithTypeHint = true);
	$invoker = new Invoker\Invoker(null, $container);

	$app->command('test:test [ip] [port] [page] [--rt]', function($ip, $port, $page = 'https://developers.google.com/oauthplayground/', $rt)  use (&$container, &$invoker) {
		
		switch($ip) {
			case '127.0.0.1' : launchXhe(($rt ? XHE_EXE_RT : XHE_EXE), $port);
			default: remoteXheLaunch(($rt ? XHE_EXE_RT : XHE_EXE), $ip, '8000', $port);
		}
		
		$container->set('client', \DI\create('Xhe\Client')->constructor($ip, $port));
		
		$proxyTempFile = createTempFile('proxies');
		extractProxiesToFile($proxyTempFile, App\Model\Proxy::where('status', 1)::get());
		
		$data = file($proxyTempFile, FILE_IGNORE_NEW_LINES);
		
		foreach($data as $row) {
			$cols = explode(":", $row);
			$proxyIp = trim(rtrim($cols[0]));
			$proxyPort = trim(rtrim($cols[1]));
			$proxyLogin = trim(rtrim($cols[2]));
			$proxyPassword = trim(rtrim($cols[3]));
			
			$invoker->call(\App\Command\DisableProxy::class);
			$invoker->call(\App\Command\EnableProxy::class, [
				'ip' => $proxyIp, 
				'port' => $proxyPort, 
				'login' => $proxyLogin, 
				'pass' => $proxyPassword
			]);
			
			if (!$invoker->call(\App\Command\IsWebpageAvailable::class, [$page])) {
				printf("Proxy %s:%d is NOT active!\n", $proxyIp, $proxyPort);
			} else {printf("Proxy %s:%d is active!\n", $proxyIp, $proxyPort);}
		}
	});

	$app->run();
?>