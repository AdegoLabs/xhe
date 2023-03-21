<?php
namespace App\Command;

class GetRefreshToken extends Command {
	public function __invoke() {
		return $this->container->get('input')->get_by_id('refresh_token')->get_value();
	}
}