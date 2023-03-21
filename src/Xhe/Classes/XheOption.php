<?php

namespace Xhe;

class XheOption  extends XheBaseDOMVisual {
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Option";
	}
	};		
?>