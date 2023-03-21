<?php

use Psr\Log\LoggerInterface;

$container = require(__DIR__ . '/../app/bootstrap.php');

$app = new Silly\Application();
$app->useContainer($container, $injectWithTypeHint = true);

$invoker = new Invoker\Invoker(null, $container);

$dump = $container->get(LoggerInterface::class);

$app->command('test', function (LoggerInterface $logger) use ($container) {
    $logger = $container->get(LoggerInterface::class);
	
	
});



$app->run();