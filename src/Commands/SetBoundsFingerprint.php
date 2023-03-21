<?php
namespace App\Command;

class SetBoundsFingerprint extends Command {
	public function __invoke($noise) {
		return $this->container->get('browser')->set_random_bounds_fingerprint($noise);
	}
}