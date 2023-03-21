<?php
	function getProjectId($file) {
		preg_match("#.*?_\(?(.*?)\)?_?.*?#i", $file, $match);
		if (!isset($match)) return false;

		switch ($match[1]):
			case 'pmcasino': return "3"; break;
			case 'telegram_spam_pmcasino': return "3"; break;
			case 'pmcasinoru': return "3"; break;
			case '24vulkan': return "2"; break;
			case 'telegram_spam_24vulkan': return "2"; break;
			case 'elslots': return "1"; break;
			case 'telegram_spam_elslots': return "1"; break;
			case 'bollywood': return "6"; break;
			case 'telegram_spam_bollywood': return "6"; break;
			case 'telegram_spam_eldoclub': return "4"; break;
			case 'eldoclub': return "4"; break;
			case 'telegram_spam_vulkanclub': return "5"; break;
			case 'vulkanclub': return "5"; break;
			default: break;
		endswitch;
		
		return false;
	}

$container = require(__DIR__ . '/../app/bootstrap.php');

$app = new Silly\Application();
$app->useContainer($container, $injectWithTypeHint = true);
$invoker = new Invoker\Invoker(null, $container);

$app->command('test:test [dir]', function($dir) use(&$container, &$invoker) {
	if (!is_dir($dir))
		die("Dir is not correct!");
	
	$files = array_diff(scandir($dir), array('.', '..', 'desktop.ini'));
	
	foreach($files as $file) {
		printf("--------------------\nStarting to process file %s...\n--------------------\n", $file);
		$rows = file($dir . DIRECTORY_SEPARATOR . $file, FILE_IGNORE_NEW_LINES);
	
		for($i = 1; $i < count($rows); $i++) {
			$model = NULL;
			$row = $rows[$i];
			$cols = explode(",", $row);
			$crmId = $cols[1];
			$phone = $cols[0];
			
			$container->get('db')->where('crmId', $crmId);
			$attendee = $container->get('db')->getOne('attendees');
			
			if (is_array($attendee)) {
				App\Model\Attendee::where('crmId', $crmId);
				
				$model = App\Model\Attendee::getOne();
				$model->phone = $phone;
				$model->save();
				
				printf("Found db entry for %s with id %d\n", $attendee['email'], $attendee['crmId']);
			} else { 
				$projectId = getProjectId($file);
				$model = App\Model\AttendeeBuilder::buildWithData([
					'projectId' => $projectId,
					'phone' => $phone,
					'crmId' => $crmId
				]);
				printf("Unable to find entry with id %d...:(Creating a new one.\n", $crmId);
			}
		}
	}
});

$app->run();