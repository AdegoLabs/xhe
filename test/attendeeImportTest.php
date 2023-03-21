<?php

$container = require(__DIR__ . '/../app/bootstrap.php');

$app = new Silly\Application();
$app->useContainer($container, $injectWithTypeHint = true);

$app->command('attendee:import [file] [projectId]', function($file, $projectId) {
	$source = file($file, FILE_IGNORE_NEW_LINES);
	
	foreach($source as $data) {
		$cols = explode(",", $data);
		$attendee = App\Model\AttendeeBuilder::buildWithData([
			'email' => strtolower(rtrim(trim($cols[0]))),
			'projectId' => $projectId,
			'crmId' => rtrim(trim($cols[1])),
		]);
	}
});

$app->run();