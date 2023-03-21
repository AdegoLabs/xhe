<?php

namespace App\Command;

class GoogleChangePassword extends Command {
	function __invoke($oldPassword, $newPassword) {
		$this->container->get('browser')->navigate('https://accounts.google.com/signin/v2/challenge/pwd?continue=https%3A%2F%2Fmyaccount.google.com%2Fsigninoptions%2Fpassword%3Fcontinue%3Dhttps%3A%2F%2Fmyaccount.google.com%2Fsecurity&service=accountsettings');
		$this->container->get('browser')->wait();
		
		if ($this->isOldPasswordRequired() ) {
			$this->inputOldPassword($oldPassword);
			$this->submitOldPasswordForm();
		}
		
		if ($this->isNewPasswordRequired()) {
			$this->inputNewPassword($newPassword);
			return $this->submitNewPasswordForm();
		}
	}
	
	function isNewPasswordRequired() {
		$this->container->get('browser')->wait();
		return $this->container->get('input')->get_by_name('password')->is_visibled();
	}
	
	function inputNewPassword($password) {
		$this->container->get('browser')->wait();
		$this->container->get('input')->get_by_name('password')->send_input($password);
		$this->container->get('browser')->wait();
		
		$this->container->get('input')->get_by_name('confirmation_password')->send_input($password);
		$this->container->get('browser')->wait();
	}
	
	function isOldPasswordRequired() {
		$this->container->get('browser')->wait();
		return $this->container->get('input')->get_by_attribute('type', 'password', false)->is_visibled();
	}
	
	function inputOldPassword($password) {
		$this->container->get('input')->get_by_attribute('type', 'password', false)->send_input($password);
		$this->container->get('browser')->wait();
	}
	
	function submitOldPasswordForm() {
		$this->container->get('div')->get_by_id('passwordNext', false)->click();
		$this->container->get('browser')->wait();
		sleep(2);
	}
	
	function submitNewPasswordForm() {
		$result = $this->container->get('button')->get_by_inner_text("Change password")->click();
		$this->container->get('browser')->wait();
		
		return $result;
	}
}