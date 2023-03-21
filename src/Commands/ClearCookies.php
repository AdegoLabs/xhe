<?php

namespace App\Command;

class ClearCookies extends Command {
	function __invoke() {
		$this->container->get('browser')->navigate('about:blank');

		$this->container->get('browser')->clear_cookies("", true);
		$this->container->get('browser')->wait();
	}
}