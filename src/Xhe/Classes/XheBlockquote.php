<?php

namespace Xhe;

class XheBlockquote  extends XheBaseDOMVisual {
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Blockquote";
	}
	};		
?>