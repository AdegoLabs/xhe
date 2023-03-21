<?php
function cmd($command, $ping = true) {
	if (!$ping)
		$pCommand = '';
	else $pCommand = ' & ' . 'ping -n -f -w 1 5000 192.168.254.254 >nul';
	
	$command .= $pCommand;
	
	$handle = popen($command, 'w');
	$read = fread($handle, 2096);
	pclose($handle);
}


$container = require(__DIR__ . '/../app/bootstrap.php');

$app = new Silly\Application();
$app->useContainer($container, $injectWithTypeHint = true);

$invoker = new Invoker\Invoker(null, $container);

$app->command('client [port]', function($port) use (&$container, &$invoker) {
	$command = '@START "XHE" "' . XHE_EXE . '" /port:' . $port;
	cmd($command);
});

$app->run();
