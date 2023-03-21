<?php
namespace App\Model;

class CalendarEvent extends Model {
	public $dbTable = 'calendar_events';
	
	public $jsonFields = Array(
		'start', 'end', 'attendees', 'reminders', 'recurrence'
	);
	public $dbFields = Array(
		'projectId' => Array('int'),
		'summary' => Array('text', 'required'),
		'description' => Array('text', 'required'),
		'start' => Array('text', 'required'),
		'end' => Array('text', 'required'),
		'location' => Array('text', 'required'),
		'visibility' => Array('text'),
		'guestsCanSeeOtherGuests' => Array('bool'),
		'guestsCanModify' => Array('bool'),
		'guestsCanInviteOthers' => Array('bool'),
		'anyoneCanAddSelf' => Array('bool'),
		'attendees' => Array('text'),
		'reminders' => Array('text'),
		'recurrence' => Array('text'),
		'createdAt' => Array('datetime'),
		'updatedAt' => Array('datetime'),
		'insertedAt' => Array('datetime'),
		'working' => Array('bool'),
		'status' => Array('bool')
	);
	
	public $relations = Array(
		'project' => Array('hasOne', "App\Model\Project", 'projectId')
	);
}