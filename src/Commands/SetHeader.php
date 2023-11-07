<?php

namespace App\Command;

class SetHeader extends Command {
	public function __invoke($array) {
		if ($this->container->get('anchor')->get_by_inner_text("Add headers", false)->is_visibled()) {
			$this->container->get('anchor')->get_by_inner_text("Add headers", false)->click();
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
			
			$this->container->get('input')->get_by_name("newHeaderName")->send_input($array['name']);
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
			
			$this->container->get('input')->get_by_name("newHeaderValue")->send_input($array['value']);
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
			
			$this->container->get('button')->get_by_id("addHeaderButton", false)->click();
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
			
			$this->container->get('anchor')->get_by_id("closeAddHeadersBubble", false)->click();
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
		}
	}
}