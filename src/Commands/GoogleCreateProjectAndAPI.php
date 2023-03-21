<?php

namespace App\Command;

class GoogleCreateProjectAndAPI extends Command {
	public function __invoke() {
		$this->container->get('browser')->navigate('https://console.cloud.google.com/apis/dashboard');
		$this->container->get('browser')->wait();
		
		
	}
}