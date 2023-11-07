<?php

namespace App\Command;

class GmailClickSearchLastMail extends Command {
	public function __invoke() {
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();
		
		$result = $this->container->get('tr')->get_by_xpath("/html/body/div[7]/div[3]/div/div[2]/div[2]/div/div/div/div[2]/div/div[1]/div/div[2]/div[5]/div[1]/div/table/tbody/tr")->click();
		
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();
		
		return $result;
		/*
		$vars = $this->container->get('tr')->get_all_by_id(":", false);
		$bulk = [];
		
		foreach($vars as $var) {
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
			if ($var->is_visibled())
				array_push($bulk, $var);
		}
		
		if (!empty($bulk)) {
			$var = array_pop($bulk);
			$var->click();
			
			$this->container->get('browser')->wait();
			$this->container->get('browser')->wait_js();
		}
		
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();
		
		return $result;
		*/
	}
}
