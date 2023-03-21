<?php

	$container = require(__DIR__ . '/../app/bootstrap.php');

	$app = new Silly\Application();
	$app->useContainer($container, $injectWithTypeHint = true);
	$invoker = new Invoker\Invoker(null, $container);

	$app->command("test:test", function() use (&$container, &$invoker) {
		$file = VAR_DIR . DIRECTORY_SEPARATOR . 'tasks/accounts.in';
		
		while ($string = App\Classes\CutLastString::cut($file))
			printf("%s\n", $string);
	});
	
	$app->run();