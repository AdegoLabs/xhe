<?php
namespace App\Command;

class GetAccessToken extends Command {
	public function __invoke() {
		return $this->container->get('input')->get_by_id('access_token_field')->get_value();
	}
}