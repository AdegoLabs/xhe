<?php

namespace Xhe;

class XheFooter extends XheBaseDOMVisual {
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Footer";
	}
	};		
?>