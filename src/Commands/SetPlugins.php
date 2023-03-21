<?php
namespace App\Command;

class SetPlugins extends Command {
	function __invoke($plugins) {
		$this->container->get('browser')->set_plugins_info($plugins);
		$this->container->get('browser')->wait();
	}
}