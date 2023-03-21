<?php
namespace App\Command;

use App\Controller\GoogleAccountController as GoogleAccountController;
use Symfony\Component\Console\Output\OutputInterface;

class GooglePlaygroundStep1 extends Command {
	public $output;
	
	public function __invoke($controller) {
		$loggedIn = $this->container->call('App\Method\GooglePlaygroundLogin', [$controller]);
		
		return $loggedIn;
	}

}