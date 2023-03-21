<?php
namespace App\Controller;

class AccountController extends Controller {
	public function hasCookies() {
		return !is_null($this->get()->cookie);
	}
	
	public function hasProxy() {
		return !is_null($this->get()->proxy);
	}
	
	public function hasProfile() {
		return !is_null($this->get()->profile);
	}
	
	public function deactivate() {
		$this->update(['status' => 0]);
		$this->onDeactivate();
	}
	
	public function activate() {
		$this->update(['status' => 1]);
	}
	
	public function working($work) {
		$this->update(['working' => $work]);
	}
	
	public function used() {
		$this->update(['used' => $this->get()->used += 1]);
	}
	
	public function onUpdate() {
		$this->update([
			'updatedAt' => date("Y-m-d H:i:s"),
		]);
	}
	
	public function onLogin() {
		$this->update([
			'loginAt' => date("Y-m-d H:i:s"),
		]);
	}
	
	public function onDeactivate() {
		$this->update([
			'deactivatedAt' => date("Y-m-d H:i:s"),
		]);
	}

	public function onCreate() {
		$this->update([
			'createdAt' => date("Y-m-d H:i:s"),
		]);
	}
	
	
}