<?php

namespace Xhe;

class XheHtml  extends XheBaseDOMVisual {
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Html";
	}
	};		
?>