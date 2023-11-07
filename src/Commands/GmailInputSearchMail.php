<?php

namespace App\Command;

class GmailInputSearchMail extends Command {
	public function __invoke($search) {
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();
		
		$this->container->get('input')->get_by_name("q")->focus();
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();
		
		$this->container->get('input')->get_by_name("q")->click();
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();
		
		$this->container->get('input')->get_by_name("q")->set_value($search);
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();

		$this->container->get('input')->get_by_name("q")->send_key(13);
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();
	}
}