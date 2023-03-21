<?php

$container = require(__DIR__ . '/../app/bootstrap.php');

$app = new Silly\Application();
$app->useContainer($container, $injectWithTypeHint = true);
$invoker = new Invoker\Invoker(null, $container);

$proxies = \App\Model\Proxy::where('status', 0)::get();

foreach($proxies as $proxy) {
	if ($accounts = \App\Model\GoogleAccount::where('proxyId', $proxy->id)::get()) {
		foreach($accounts as $account) {
			$account->proxyId = NULL;
			$account->save();
		
			printf("Account proxy %s was refreshed!\n", $account->email);
		}
	}
}

$app->run();