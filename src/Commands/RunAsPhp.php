<?php

namespace App\Command;

class RunAsPhp extends Command {
	function __invoke($php, $dir = 'C:\XWeb\tmp') {
		if (!realpath($dir)) if (@!mkdir($dir)) $dir = '/';
		$fileName = uniqid('script') . '.php';
		
		$this->container->get('application')->run_as_php($php, $dir . DIRECTORY_SEPARATOR . $fileName, false, "");
		$this->container->get('browser')->wait();
	}
}