<?php
class Spintax {
    public function process($text) {
        return preg_replace_callback(
            '/\{(((?>[^\{\}]+)|(?R))*?)\}/x',
            array($this, 'replace'),
            $text
        );
    }

    public function replace($text) {
        $text = $this->process($text[1]);
        $parts = explode('|', $text);
        return $parts[array_rand($parts)];
    }
}

function spin($text) {
	$s = new Spintax;
	$spun = $s->process($text);
	
	return $spun;
}

function cutAttendees(&$attendees) {
	shuffle($attendees);
		$attendeesPool = array();
		for ($i = 0; $i < 15; $i++):
			if (empty($attendees))
				break;
					
				array_push($attendeesPool, trim(rtrim(array_pop($attendees))));
		endfor;
		
		return $attendeesPool;
}

?>

<?php
	if (isset($_POST) && !empty($_POST)) {
		set_time_limit(0);
		$saveDir = 'C:\xampp\htdocs\xhe\var\drivefiles\new';
		
		$targetEmails = explode("\n", $_POST['targetemails']);
		$targetEmails = array_map('trim', $targetEmails);
		
		if (@count($targetEmails > 15)) {
			$amount = count($targetEmails) / 15;
			
			if (preg_match("#{#", $_POST['name'])) {
				$name = spin($_POST['name']);
			} else {$name = $_POST['name'];}
			
			if (preg_match("#{#", $_POST['description'])) {
				$description = spin($_POST['description']);
			} else {$description = $_POST['description'];}
			
			if (preg_match("#{#", $_POST['body'])) {
				$body = spin($_POST['body']);
			} else {$body = $_POST['body'];}
			
				
			for ($i = 0; $i < $amount; $i++) {
				$filename = $saveDir . DIRECTORY_SEPARATOR . uniqid() . '.json';
				$content = [
					'name' => $name,
					'description' => $description,
					'contenttype' => $_POST['contenttype'],
					'body' => $body,
					'targetemails' => cutAttendees($targetEmails),
				];
			
				$fW = fopen($filename, "w");
				fwrite($fW, json_encode($content));
			}
		} else {
			$filename = $saveDir . DIRECTORY_SEPARATOR . uniqid() . '.json';
			$content = [
				'name' => $_POST['name'],
				'description' => $_POST['description'],
				'contenttype' => $_POST['contenttype'],
				'body' => $_POST['body'],
				'targetemails' => $targetEmails,
			];
			
			$fW = fopen($filename, "w");
			fwrite($fW, json_encode($content));
		}
	}
	