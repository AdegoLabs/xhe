<?php

namespace App\Command;

class GmailReplyCurrentMail extends Command {
	public function __invoke($message) {
		if ($this->container->get('span')->get_by_inner_text("Ответить", false)->is_exist()) {
			$this->container->get('span')->get_by_inner_text("Ответить", false)->focus();
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
			$this->container->get('span')->get_by_inner_text("Ответить", false)->click();
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
		} else {
			if ($this->container->get('span')->get_by_id(":1r", false)->is_exist()) {
				$this->container->get('browser')->wait();
				$this->container->get('browser')->wait_js();
				$this->container->get('span')->get_by_id(":1r", false)->click();
				$this->container->get('browser')->wait();
				$this->container->get('browser')->wait_js();
			}
		  }
		
		if ($this->container->get('textarea')->get_by_number(0)->is_exist()) {
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
			$this->container->get('textarea')->get_by_number(0)->send_input($message);
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
		}

		if ($this->container->get('div')->get_by_inner_text("Отправить", true)->is_exist()) {
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
			$this->container->get('div')->get_by_inner_text("Отправить", true)->send_mouse_click();
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
		}
	}
}