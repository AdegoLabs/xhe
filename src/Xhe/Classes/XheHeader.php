<?php

namespace Xhe;

class XheHeader  extends XheBaseDOMVisual {
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Header";
	}
	};		
?>