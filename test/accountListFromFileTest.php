<?php

$container = require(__DIR__ . '/../app/bootstrap.php');

$app = new Silly\Application();
$app->useContainer($container, $injectWithTypeHint = true);

$invoker = new Invoker\Invoker(null, $container);

$source = VAR_DIR . DIRECTORY_SEPARATOR . 'tasks' . DIRECTORY_SEPARATOR . 'accounts.in';
$account = App\Model\GoogleAccount::where('email', App\Classes\CutLastString::cut($source), 'like')::getOne();

printf($account->email);

$app->run();