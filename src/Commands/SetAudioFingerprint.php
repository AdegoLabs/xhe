<?php
namespace App\Command;

class SetAudioFingerprint extends Command {
	public function __invoke($noise, $frequency) {
		return $this->container->get('browser')->set_random_audio_fingerprint($noise, $frequency);
	}
}