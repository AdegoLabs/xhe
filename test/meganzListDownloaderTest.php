<?php

	$container = require(__DIR__ . '/../app/bootstrap.php');

	$app = new Silly\Application();
	$app->useContainer($container, $injectWithTypeHint = true);
	$invoker = new Invoker\Invoker(null, $container);

	$app->command("test:test [ip] [port] [source] [destination] [--rt]", function( $ip, $port,  $source, $destination, $rt) use (&$container, &$invoker) {
		if (!file_exists($source))
			die("No source file...");
		
		switch($ip) {
			case '127.0.0.1' : launchXhe(($rt ? XHE_EXE_RT : XHE_EXE), $port);
			default: remoteXheLaunch(($rt ? XHE_EXE_RT : XHE_EXE), $ip, '8000', $port);
		}
		
		$container->set('client', \DI\create('Xhe\Client')->constructor($ip, $port));
		
		while($url = App\Classes\CutLastString::cut($source)) {
			$invoker->call(App\Command\MeganzDownload::class, [
				'url' => $url,
				'destination' => $destination
			]);
		}
	});
	
	$app->run();
?>