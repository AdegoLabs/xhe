<?php

namespace Xhe;

class XheLi  extends XheBaseDOMVisual
{
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Li";
	}
	};		
?>