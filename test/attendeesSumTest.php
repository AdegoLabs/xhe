<?php

$container = require(__DIR__ . '/../app/bootstrap.php');

$app = new Silly\Application();
$app->useContainer($container, $injectWithTypeHint = true);

$app->command('test:test', function() {
	$attendees = [];
	$files = array_diff(scandir(EVENTS_UNPUBLISHED_DIR), array('.', '..'));

	foreach($files as $file) {
		$content = json_decode(file_get_contents(EVENTS_UNPUBLISHED_DIR . DIRECTORY_SEPARATOR . $file), true);
		$data = $content['attendees'];
		
		foreach($data as $attendeeData) {
			array_push($attendees, $attendeeData['email']);
			var_dump($attendeeData['email']);
		}
		
		file_put_contents(EVENTS_DIR . DIRECTORY_SEPARATOR . 'unpublished.txt', implode("\n", $attendees));
	}
});

$app->run();