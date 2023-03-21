<?php

$container = require(__DIR__ . '/../app/bootstrap.php');

$app = new Silly\Application();
$app->useContainer($container, $injectWithTypeHint = true);

$app->command('attendee:import [dir]', function($dir) {
	$files = array_diff(scandir($dir), array('.', '..'));
	
	foreach($files as $file) {	
		$source = file($dir . DIRECTORY_SEPARATOR . $file, FILE_IGNORE_NEW_LINES);
		
		foreach($source as $data) {
			$cols = explode(",", $data);
			$attendee = App\Model\AttendeeBuilder::buildWithData([
				'email' => strtolower($cols[0]),
				'projectId' => $cols[1],
				'crmId' => $cols[1],
			]);
			unset($attendee);
		}
	}
});

$app->run();