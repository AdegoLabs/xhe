<?php

namespace Xhe;

class XheP  extends XheBaseDOMVisual {
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "P";
	}
	};		
?>