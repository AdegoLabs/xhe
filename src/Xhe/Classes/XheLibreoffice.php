<?php
namespace Xhe;

class XheLibreOffice extends XheBaseObject
{
	///////////////////////////////// СЕРВИСНЫЕ ФУНКЦИИ ////////////////////////////////////////////////
	// server initialization
	function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "LibreOffice";
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////

        // задать папку иснталяции (по умолчанию "C:\Program Files\LibreOffice\program\")
	function set_install_folder($folder)
	{
		$params = array( "folder" => $folder );
		return $this->call_boolean(__FUNCTION__,$params);
	}

	// конвертировать файл из одного в другой формат
	function convert($inpath,$outpath,$infilter="")
	{
		$params = array( "inpath" => $inpath , "outpath" => $outpath, "infilter" => $infilter);
		return $this->call_boolean(__FUNCTION__,$params);
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////

};	
?>