<?php
	if (!file_exists('madeline.php')) {
		copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
	}

	include 'madeline.php';
	
	use danog\MadelineProto\MyTelegramOrgWrapper;
	
	$container = require(__DIR__ . '/../app/bootstrap.php');

	$app = new Silly\Application();
	$app->useContainer($container, $injectWithTypeHint = true);

	$invoker = new Invoker\Invoker(null, $container);
	
	$wrapper = new MyTelegramOrgWrapper([]);
	$wrapper->async(true);	
	//var_dump($wrapper);
	$app->command('test:test', function() use (&$wrapper){
		echo "gek";
		
		$wrapper->login($wrapper->readline('Enter your phone number (this number must already be signed up to telegram)'));
		$wrapper->completeLogin($wrapper->readline('Enter the code'));

		if ($wrapper->loggedIn()) {
			if ($wrapper->hasApp()) {
				$app = $wrapper->getApp();
				var_dump($app);
			} else {
				$appTitle = $wrapper->readLine('Enter the app\'s name, can be anything: ');
				$shortName = $wrapper->readLine('Enter the app\'s short name, can be anything: ');
				$url = $wrapper->readLine('Enter the app/website\'s URL, or t.me/yourusername: ');
				$description = $wrapper->readLine('Describe your app: ');
				
				$app = $wrapper->createApp(['app_title' => $appTitle, 'app_shortname' => $shortName, 'app_url' => $url, 'app_platform' => 'web', 'app_desc' => $description]);
				
				var_dump($app);
			}
			
			//\danog\MadelineProto\Logger::log($app);
		}
	});
	
	$app->run();