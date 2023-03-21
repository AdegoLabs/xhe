<?php

namespace Xhe;

class XhePre  extends XheBaseDOMVisual {
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Pre";
	}
	};		
?>