<?php

namespace Xhe;

class XheInputImage  extends XheInputImageCompatible {
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "InputImage";
	}
	};	
?>