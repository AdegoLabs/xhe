<?php
namespace App\Controller;

class ProxyController extends Controller {
	public function has() {
		return !is_null($this->get());
	}
	
	public function getIp() {
		return $this->get()->ip;
	}
	
	public function getPort() {
		return $this->get()->port;
	}
	
	public function getLogin() {
		return $this->get()->login;
	}
	
	public function getPassword() {
		return $this->get()->password;
	}
}