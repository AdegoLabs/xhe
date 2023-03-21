<?php

namespace Xhe;

class XheCode  extends XheBaseDOMVisual {
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Code";
	}
	};		
?>