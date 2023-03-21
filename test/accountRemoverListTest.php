<?php

	$container = require(__DIR__ . '/../app/bootstrap.php');

	$app = new Silly\Application();
	$app->useContainer($container, $injectWithTypeHint = true);

	$invoker = new Invoker\Invoker(null, $container);

	$app->command('test:test', function() {
		$file = VAR_DIR . DIRECTORY_SEPARATOR . 'tasks' . DIRECTORY_SEPARATOR . 'accounts-delete.in';
		
		if ( !file_exists($file) )
			die('File not found!');
		
		while (filesize($file) > 2) {
			$account = App\Model\GoogleAccount::where('email', App\Classes\CutLastString::cut($file), 'like')::getOne();
			
			if (is_null($account))
				continue;
			
			if ($account->delete())
				printf("Account %s was deleted!\n", $account->email);
		}
	});
	
	$app->run();
?>