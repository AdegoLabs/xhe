<?php

namespace App\Command;

class SetLanguage extends Command {
	function __invoke($language) {
		$this->container->get('browser')->set_language($language);
		$this->container->get('browser')->wait();
	}
}