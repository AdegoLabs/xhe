<?php

function launchXhe($file, $port, $script = 'C:\XWeb\Human Emulator Studio 7.0.62\My Scripts\16.php'): bool {
			//exec('@START "" "' . $file . '" /port:"' . $port . '" /script:"' . $script . '"');
			exec('START "" "C:\XWeb\XWebRT" /port:"' . $port . '" /script:"' . $script . '"');
			sleep(10);
			return true;
}

$container = require(__DIR__ . '/../app/bootstrap.php');

$app = new Silly\Application();
$app->useContainer($container, $injectWithTypeHint = true);

$invoker = new Invoker\Invoker(null, $container);

$app->command('run:test [ip] [port]', function($ip, $port) use (&$container, &$invoker) {
	launchXhe(XHE_EXE_RT, $port);
	
	$container->set('client', \DI\create('Xhe\Client')->constructor($ip, $port));
	$container->get('debug')->set_cur_script_path(__DIR__);
	$container->get('browser')->navigate('google.com');
	$container->get('input')->get_by_number(0)->send_input('Hello World!');
	$container->get('browser')->wait();
	
	
});

$app->run();
