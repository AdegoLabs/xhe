<?php

use \s00d\OnlineSimApi\OnlineSimApi as OnlineSimApi;

$container = require(__DIR__ . '/../app/bootstrap.php');

$app = new Silly\Application();
$app->useContainer($container, $injectWithTypeHint = true);

$api = new \App\Classes\OnlineSim(new OnlineSimApi($key = 'ec2025fdadfe6b27b8f5e1cbbe7101da', 'RU'));

$app->command('test:test', function() use(&$api) {
	$tzid = ($api->getTzid('google')['tzid']);
	$phone = $api->getNumByTzid($tzid)['number'];
	closeOperationByTzid($tzid);
	
});

$app->run();
