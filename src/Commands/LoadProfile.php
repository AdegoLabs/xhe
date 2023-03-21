<?php
namespace App\Command;

class LoadProfile extends Command {
	function __invoke($path) {
		$this->container->get('browser')->load_profile($path);
		$this->container->get('browser')->wait();
	}
}
