<?php
namespace Xhe;
class XheU  extends XheBaseVisualDom
{
	/////////////////////////////////////// SERVICE /////////////////////////////////////////////////////
	// server initialization
	function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "U";
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////
};		
?>