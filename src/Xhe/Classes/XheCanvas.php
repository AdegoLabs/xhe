<?php

namespace Xhe;

class XheCanvas  extends XheBaseDOMVisual {
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Canvas";
	}
	
		function draw_image_by_number($number,$path, $frame=-1) 
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "path" => $path , "frame" => $frame );
		return $this->call_boolean(__FUNCTION__,$params);
	}
};		
?>