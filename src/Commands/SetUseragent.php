<?php

namespace App\Command;

class SetUseragent extends Command {
	function __invoke($useragent) {
		$this->container->get('browser')->set_user_agent($useragent);
		$this->container->get('browser')->wait();
	}
}