<?php

	$container = require(__DIR__ . '/../app/bootstrap.php');
	
	use MadeITBelgium\Spintax\Spintax as Spintax;

	$app = new Silly\Application();
	$app->useContainer($container, $injectWithTypeHint = true);

	$invoker = new Invoker\Invoker(null, $container);
	
	$message = file_get_contents('C:\xampp\htdocs\xhe\var\messages\tg_gd0107.txt');
	
	if (preg_match("#{#", $message) && preg_match("#\\|#", $message) && preg_match("#}#", $message)) {
		$useSpintax = true;
		
		printf("Enabled spintax using!\n");
	}
	
	//printf("%s\n", Spintax::parse($message)->generate());
	printf("%s\n", $container->get('spintax')->process($message));
	
	
	
	$app->run();
?>