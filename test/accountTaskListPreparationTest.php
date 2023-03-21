<?php

$container = require(__DIR__ . '/../app/bootstrap.php');

$app = new Silly\Application();
$app->useContainer($container, $injectWithTypeHint = true);

$invoker = new Invoker\Invoker(null, $container);

$destination = VAR_DIR . DIRECTORY_SEPARATOR . 'tasks' . DIRECTORY_SEPARATOR . 'accounts.in';

if (isset($argv[1]))
	$q = $argv[1];
else $q = 150;

try {
	$data = App\Model\GoogleAccount::where('status', 1)::where('working', 0)::orderBy('used', 'asc')::get($q);
//	foreach($data as $account) {
	for ($i = count($data) - 1; $i >= 0; $i--) {
		$account = $data[$i];
		$fp = fopen($destination, 'a');
		fwrite($fp, $account->email . "\n");
		printf("%s was added to task list.\n", $account->email);
		fclose($fp);
	}
} catch(string $e) {
	printf("Some errors during account preparation!\n");
}

$app->run();