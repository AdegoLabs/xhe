<?php

namespace App\Command;

class Vanish extends Command {
	function __invoke() {
		$this->container->get('browser')->navigate('about:blank');
		$this->container->get('application')->clear();
		$this->container->get('browser')->wait();
	}
}