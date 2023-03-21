<?php

namespace App\Command;

class SetTimezone extends Command {
	function __invoke() {
		$this->container->get('browser')->wait();
	}
}