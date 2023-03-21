<?php

function beep($int_beeps = 1) {
	$string_beeps = '';
    for ($i = 0; $i < $int_beeps; $i++): $string_beeps .= "\x07"; endfor;
    isset ($_SERVER['SERVER_PROTOCOL']) ? false : print $string_beeps;
}
  
beep(3);

?>