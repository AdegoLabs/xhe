<?php

	$container = require(__DIR__ . '/../app/bootstrap.php');

	$app = new Silly\Application();
	$app->useContainer($container, $injectWithTypeHint = true);

	$app->command('email:check', function() use ($container) {
		function getUnused() {
			App\Model\Attendee::where('status', 0);
			App\Model\Attendee::where('email', NULL, 'is not');
			$model = App\Model\Attendee::getOne();
			
			return $model;
		}
		$key = '4zUNhuoqQmeFCDAGEkyYHcZsMLvjSJPt';

		while (!is_null($model = getUnused())) {
			$email = urlencode($model->email);
			
			printf("Working with email %s\n", urldecode($email));
			if ($check = isEmailReal($key, $email)) {
				printf("Email %s is real.\n", urldecode($email));
				$model->status = 1;
				$model->save();
			} else {
				printf("Email %s is NOT real.\n", urldecode($email));
				$model->delete();
			}
		}
	});
	
	$app->run();
?>