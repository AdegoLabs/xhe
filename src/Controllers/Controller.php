<?php

namespace App\Controller;

class Controller {
	protected $model = NULL;
	
	public function __construct($model = null) {
		if (!is_null($model))
			$this->model = $model;
	}
	
	public function get() {
		return $this->model;
	}
	
	public function set($model) {
		$this->model = $model;
	}
	
	public function save() {
		return $this->get()->save();
	}

	public function update($data) {
		return $this->get()->update($data);
	}
	
}