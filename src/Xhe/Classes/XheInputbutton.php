<?php

namespace Xhe;

class XheInputButton  extends XheInputButtonCompatible {
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "InputButton";
	}	
	};	
?>