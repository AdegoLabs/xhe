<?php
namespace App\Command;

class Command {
	public $container;
	
	public function __construct( $container) {
		$this->container = $container;
		$this->container->get('debug')->set_cur_script_path(__DIR__); // ???? remote
	}
	
	public function navigate($url) {
		$this->container->get('browser')->navigate($url);
		$this->container->get('browser')->wait();
		$this->container->get('browser')->wait_js();
	}
}