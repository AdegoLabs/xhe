<?php
namespace App\Command;

class InsertGoogleCalendarEventBody extends Command {
	public function __invoke($body) {
		$this->container->get();
	}
}