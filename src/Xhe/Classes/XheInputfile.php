<?php

namespace Xhe;

class XheInputFile  extends XheInputFileCompatible {
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "InputFile";
	}
   	};		
?>