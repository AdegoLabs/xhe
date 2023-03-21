<?php
namespace App\Command;

class ExchangeTokens extends Command {
	public function __invoke() {
		if ($this->container->get('button')->get_by_id('exchangeCode')->is_visibled()) {
			$this->container->get('browser')->wait();
			$this->container->get('button')->get_by_id('exchangeCode')->click();
			$this->container->get('browser')->wait();
		}
	}
}