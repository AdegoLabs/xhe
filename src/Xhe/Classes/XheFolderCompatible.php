<?php
namespace Xhe;
class XheFolderCompatible extends XheBaseObject
{
	/////////////////////////////////////////////////////////////////////////////////////////////////////
	
	// создать каталог
	function create_folder($path)
	{			  
		return $this->create($path);
	}
        // получить имя папки
	function get_folder_name($path)
	{			  
		return $this->get_name($path);
	}
        // получить букву диска папки
	function get_folder_disk($path)
	{			  
		return $this->get_disk($path);
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////
};		
?>