<?php
namespace App\Command;

class SetWebGlFingerprint extends Command {
	public function __invoke($noiseImage = "", $noiseParams = "", $unmaskedVendor = "", $unmaskedRenderer = "", $glVersion = "", $shadingLanguageVersion = "", $vendor = "", $renderer="") {
		return $this->container->get('browser')->set_random_webgl_fingerprint(true, $noiseImage, $noiseParams, $unmaskedVendor, $unmaskedRenderer, $glVersion, $shadingLanguageVersion, $vendor, $renderer);
	}
}