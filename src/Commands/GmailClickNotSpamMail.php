<?php

namespace App\Command;

class GmailClickNotSpamMail extends Command {
	public function __invoke() {
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();
		
		$result = $this->container->get('button')->get_by_inner_text("Не спам", false)->click();
		
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();
		
		if (!$result) {
			$result = $this->container->get('button')->get_by_xpath("/html/body/div[7]/div[3]/div/div[2]/div[2]/div/div/div/div[2]/div/div[1]/div/div[4]/div/table/tr/td/div[2]/div[2]/div/div[3]/div/div/div/div/div/div[1]/div[2]/div[2]/div[1]/div/div[1]/div/button")->click();
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
		}
		
		return $result;
	}
}