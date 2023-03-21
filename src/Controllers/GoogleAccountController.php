<?php
namespace App\Controller;

class GoogleAccountController extends AccountController {
	
public function getEmail() {
		$email = strtolower($this->get()->email);
		if (!preg_match("#@#", $email))
			$email .= '@gmail.com';
			
		return $email;
	}
	
	public function getPassword() {
		return $this->get()->password;
	}
	
	public function setPassword($password) {
		$this->update(['password' => $password]);
	}
	
	public function getReserveEmail() {
		return $this->get()->rEmail;
	}
	
	public function getData() {
		return [
			'email' => $this->getEmail(),
			'password' => $this->getPassword(),
			'reserveEmail' => $this->getReserveEmail()
		];
	}

	
}