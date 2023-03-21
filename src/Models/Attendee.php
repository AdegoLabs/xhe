<?php
namespace App\Model;

class Attendee extends Model {
	public $dbTable = 'attendees';	
	public $dbFields = Array(
		'projectId' => Array('int'),
		'crmId' => Array('int'),
		'email' => Array('text'),
		'phone' => Array('text'),
		'used' => Array('int'),
		'status' => Array('bool'),
	);
	
	protected $relations = Array (
        'project' => Array ("hasOne", "App\Model\Project", "projectId"),
    );

	
}