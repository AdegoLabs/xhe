<?php

	$container = require(__DIR__ . '/../app/bootstrap.php');

	$app = new Silly\Application();
	$app->useContainer($container, $injectWithTypeHint = true);

	$app->command('email:check [email]', function($email) use ($container) {
		$key = '4zUNhuoqQmeFCDAGEkyYHcZsMLvjSJPt';
		$email = urlencode($email);
		
		if (is_bool($check = isEmailReal($key, $email))) {
			if ($check) {
				printf("Email %s is real.\n", urldecode($email));
			} else {
				printf("Email %s is NOT real.\n", urldecode($email));
			}
		} else {
			printf("Suggested email is %s.\n", $check);
		}
	});
	
	$app->run();
?>