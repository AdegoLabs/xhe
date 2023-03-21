<?php
namespace App\Model;

use App\Model\CalendarEvent;

class CalendarEventBuilder {
	public function build() {
		$model = new App\Model\CalendarEvent;
		if ($model->save())
			return $model;
		
		return false;
	}
}