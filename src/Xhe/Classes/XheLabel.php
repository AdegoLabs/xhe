<?php

namespace Xhe;

class XheLabel  extends XheBaseDOMVisual
{
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Label";
	}
	};		
?>