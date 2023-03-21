<?php
	function getProjectId($file) {
		preg_match("#.*?_\(?(.*?)\)?_?.*?#i", $file, $match);
		if (!isset($match)) return false;

		switch ($match[1]):
			case 'pmcasino': return "3"; break;
			case 'google_spam_pmcasino': return "3"; break;
			case 'pmcasinoru': return "3"; break;
			case '24vulkan': return "2"; break;
			case 'google_spam_24vulkan': return "2"; break;
			case 'elslots': return "1"; break;
			case 'google_spam_elslots': return "1"; break;
			case 'bollywood': return "6"; break;
			case 'google_spam_bollywood': return "6"; break;
			case 'google_spam_eldoclub': return "4"; break;
			case 'eldoclub': return "4"; break;
			case 'google_spam_vulkanclub': return "5"; break;
			case 'vulkanclub': return "5"; break;
			default: break;
		endswitch;
		
		return false;
	}

	$container = require(__DIR__ . '/../app/bootstrap.php');

	$app = new Silly\Application();
	$app->useContainer($container, $injectWithTypeHint = true);

	$app->command('attendee:import', function() use ($container) {
		$dir = VAR_DIR . DIRECTORY_SEPARATOR . 'import' . DIRECTORY_SEPARATOR . 'attendees';
		
		$options = [
			"fieldChar" => ',',
			"lineChar" => '\n', 
			"linesToIgnore" => 1
		];
		$files = array_diff(scandir($dir), array('.', '..', 'desktop.ini'));
		
		foreach($files as $file) {
			if (!$container->get('db')->loadData("attendees", $dir . DIRECTORY_SEPARATOR . $file, $options))
				die("Some errors during import...\n");
			else printf("File %s was imported in sql database successfully!\n", $file);
		}
	});

	$app->run();
?>