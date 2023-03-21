<?php

$container = require(__DIR__ . '/../app/bootstrap.php');

$app = new Silly\Application();
$app->useContainer($container, $injectWithTypeHint = true);
$invoker = new Invoker\Invoker(null, $container);

if (isset($argv[1]))
	$data = file($argv[1], FILE_IGNORE_NEW_LINES);

if (!is_array($data) || empty($data))
	die('Empty dataset...');

foreach($data as $row) {
	$cols = explode(":", $row);
	
	(App\Model\ProxyBuilder::buildWithData([
		'ip' => rtrim(trim($cols[0])),
		'port' => rtrim(trim($cols[1])),
		'login' => rtrim(trim($cols[2])),
		'password' => rtrim(trim($cols[3])),
		'language' => 'ru'
	]));
	
	printf("Proxy %s was imported successfully!\n", $cols[0]);
}

$app->run();