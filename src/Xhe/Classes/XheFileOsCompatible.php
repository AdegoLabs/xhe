<?php
namespace Xhe;

class XheFileOsCompatible extends XheBaseObject
{
		
        	function get_file_name($path)
	{			  
		return $this->get_name($path);
	}
        	function get_file_title($path)
	{			  
		return $this->get_title($path);
	}
        	function get_file_ext($path)
	{			  
		return $this->get_ext($path);
	}
        	function get_file_folder($path)
	{			  
		return $this->get_folder($path);
	}
        	function get_file_disk($path)
	{			  
		return $this->get_disk($path);
	}

	};		
?>