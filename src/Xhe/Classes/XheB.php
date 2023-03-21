<?php

namespace Xhe;

class XheB  extends XheBaseDOMVisual {
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "B";
	}
	};		
?>