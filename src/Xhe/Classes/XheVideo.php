<?php

namespace Xhe;

class XheVideo  extends XheBaseDOMVisual {
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Video";
	}
	};		
?>