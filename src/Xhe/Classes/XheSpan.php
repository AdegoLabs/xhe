<?php

namespace Xhe;

class XheSpan  extends XheBaseDOMVisual
{
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Span";
	}
	};		
?>