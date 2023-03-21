<?php
namespace App\Command;

class SetCookie extends Command {
	function __invoke($entry) {
		$this->container->get('browser')->set_cookie($entry);
		$this->container->get('browser')->wait();
	}
}