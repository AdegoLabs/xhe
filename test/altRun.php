<?php

function launchXhe($file, $port) {
	return run('@START "XHE" "' . $file . '" /port:' . $port . ' /in_tray:1', true);
}

function run($command, $ping = true) {
	if (!$ping)
		$pCommand = '';
	else $pCommand = ' & ' . 'ping -n -f -w 1 5000 192.168.254.254 >nul';
	
	$command .= $pCommand;
	
	/*
	$resource = proc_open($command, );
	$read = fread($resource, 2096);
	
	return $resource;
	*/
	
	$handle = popen($command, 'w');
	$read = fread($handle, 2096);
	pclose($handle);
	
	
}

$container = require(__DIR__ . '/../app/bootstrap.php');

$app = new Silly\Application();
$app->useContainer($container, $injectWithTypeHint = true);

$invoker = new Invoker\Invoker(null, $container);

$app->command('run:test [ip] [port]', function($ip, $port) use (&$container, &$invoker) {
	//launchXhe(XHE_EXE_RT, $port);
	$container->set('client', \DI\create('Xhe\Client')->constructor($ip, $port));
	$container->get('debug')->set_cur_script_path(__DIR__);
	$container->get('browser')->navigate('google.com');
	$container->get('input')->get_by_number(0)->send_input('Hello World!');
	$container->get('browser')->wait();
	
	
});

$app->run();
?>