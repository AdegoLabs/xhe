<?php

$container = require(__DIR__ . '/../app/bootstrap.php');

$app = new Silly\Application();
$app->useContainer($container, $injectWithTypeHint = true);
$invoker = new Invoker\Invoker(null, $container);

$container->set('client', \DI\create('Xhe\Client')->constructor('127.0.0.1', 7012));

printf('Hello and bye...');

$app->run();