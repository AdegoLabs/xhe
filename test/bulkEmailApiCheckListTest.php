<?php

	$container = require(__DIR__ . '/../app/bootstrap.php');

	$app = new Silly\Application();
	$app->useContainer($container, $injectWithTypeHint = true);
	
	$emailsFile = 'C:\Users\user741\Desktop\workflow\projects\calendar api\attendees\test\po-outreach\Gmail-56k.csv';
	$output = 'C:\Users\user741\Desktop\workflow\projects\calendar api\attendees\test\po-outreach\Gmail-56k_checked.csv';
	$emails = file($emailsFile, FILE_IGNORE_NEW_LINES);
	
	$app->command('email:check', function() use (&$container, &$emails, &$output) {
		$key = '4zUNhuoqQmeFCDAGEkyYHcZsMLvjSJPt';

		while (($row = array_pop($emails))) {
			$email = urlencode(trim($row));
			
			printf("Working with email %s\n", urldecode($email));
			if ($check = isEmailReal($key, $email)) {
				printf("Email %s is real.\n", urldecode($email));
				file_put_contents($output, urldecode($email) . "\n", FILE_APPEND);
			} else {
				printf("Email %s is NOT real.\n", urldecode($email));
			}
		}
	});
	
	$app->run();
?>