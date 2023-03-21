<?php

namespace Xhe;

class XheH  extends XheBaseDOMVisual {
			function __construct($server,$number,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "H".$number;
	}
	};		
?>