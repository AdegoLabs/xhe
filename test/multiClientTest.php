<?php

$container = require(__DIR__ . '/../app/bootstrap.php');

$app = new Silly\Application();
$app->useContainer($container, $injectWithTypeHint = true);

$func = function() use ($container) {
	($container->make('debug')->set_cur_script_path(__DIR__));
	$container->make('browser')->navigate('google.com');
	$container->make('browser')->wait();
	$container->make('input')->get_by_number(0)->send_input('Hello');
	$container->make('browser')->wait();
};

$container->set('client', DI\create('Xhe\Client')->constructor('127.0.0.1', 7030));
$func();

$container->set('client', DI\create('Xhe\Client')->constructor('127.0.0.1', 7031));
$func();

$container->set('client', DI\create('Xhe\Client')->constructor('127.0.0.1', 7032));
$func();

$app->run();