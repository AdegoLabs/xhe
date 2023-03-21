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

	function modifyFile($file, $projectId) {
		$content = file($file, FILE_IGNORE_NEW_LINES);
		$updated = array();
		
		foreach($content as $row) {
			$cols = explode(",", rtrim(trim($row)));
			$value = "," . $projectId . "," . (isset($cols[1]) ? $cols[1] : '') . "," . $cols[0] . ",,0,1";
			
			array_push($updated, $value . "\n");
		}
		
		file_put_contents($file, $updated);
	}


$container = require(__DIR__ . '/../app/bootstrap.php');

$app = new Silly\Application();
$app->useContainer($container, $injectWithTypeHint = true);

$app->command('attendee:import [dir]', function($dir) {
	$files = array_diff(scandir($dir), array('.', '..', 'desktop.ini'));
	
	foreach($files as $file) {
		printf("Trying to modify the file %s...\n", $file);
		
		$newFile = VAR_DIR . DIRECTORY_SEPARATOR . 'import' . DIRECTORY_SEPARATOR . 'sql' . DIRECTORY_SEPARATOR . $file;
		
		copy($dir . DIRECTORY_SEPARATOR . $file, $newFile);
		modifyFile($newFile, getProjectId($file)); //ProjectId PMK
		
		printf("File %s was modified successfully!\n", $newFile);
	}
});

$app->run();