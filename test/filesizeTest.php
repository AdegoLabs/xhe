<?php

	$container = require(__DIR__ . '/../app/bootstrap.php');

	$app = new Silly\Application();
	$app->useContainer($container, $injectWithTypeHint = true);

	$invoker = new Invoker\Invoker(null, $container);

	$file = VAR_DIR . DIRECTORY_SEPARATOR . 'tasks' . DIRECTORY_SEPARATOR . 'accounts-delete.in';
	
	printf("File size of accounts-delete.in is %d\n", filesize($file));
	
	while(filesize($file) !== 0) {
		printf("Runnig...\n");
	}
	
?>