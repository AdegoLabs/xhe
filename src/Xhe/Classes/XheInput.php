<?php

namespace Xhe;



class XheInput  extends XheInputCompatible {
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Input";
	}
	};		
?>