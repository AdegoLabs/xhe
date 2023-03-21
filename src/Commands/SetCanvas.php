<?php
namespace App\Command;

class SetCanvas extends Command {
	function __invoke($canvas) {
		$this->container->get('browser')->set_canvas_toDataURL($canvas);
		$this->container->get('browser')->wait();
	}
}