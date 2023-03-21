<?php
namespace Xhe;

class XheFTPCompatible extends XheBaseObject
{
			function create_directoy($server,$dir_name)
	{
		return $this->call("FTP.CreateDirectory?server=".base64_encode($server)."&dir_name=".base64_encode($dir_name));
	}
		function disconect($server)
	{	   	
	    	return $this->disconnect($server);
	}        
		function disconect_all()
	{
	   	return $this->disconnect_all();
	}
};		
?>