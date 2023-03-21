<?php
namespace Xhe;

class XheFolderCompatible extends XheBaseObject
{
		
		function create_folder($path)
	{			  
		return $this->create($path);
	}
        	function get_folder_name($path)
	{			  
		return $this->get_name($path);
	}
        	function get_folder_disk($path)
	{			  
		return $this->get_disk($path);
	}

	};		
?>