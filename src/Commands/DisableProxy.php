<?php
namespace App\Command;

class DisableProxy extends Command {
	function __invoke() {
		
		$this->container->get('browser')->disable_proxy("", false);
		$this->container->get('browser')->wait_js();
	}
}