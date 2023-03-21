<?php
namespace App\Model;

class Project extends Model {
	public $dbTable = 'projects';	
	public $dbFields = Array(
		'label' => Array('text', 'required'),
		'description' => Array('text')
	);
	
}