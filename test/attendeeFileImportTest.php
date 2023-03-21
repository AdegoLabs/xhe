<?php

	$container = require(__DIR__ . '/../app/bootstrap.php');

	$app = new Silly\Application();
	$app->useContainer($container, $injectWithTypeHint = true);

	$app->command('attendee:import [file]', function($file) use ($container) {
		$options = [
			"fieldChar" => ',',
			"lineChar" => '\n', 
			"linesToIgnore" => 1
		];
		if (!$container->get('db')->loadData("attendees", $file, $options))
			die("Some errors during import...\n");
		
	});

	$app->run();
?>