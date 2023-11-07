<?php
namespace Xhe;
class XheFineReader extends XheBaseObject
{
	////////////////////////////////////// СЕРВИСНЫЕ ФУНКЦИИ ///////////////////////////////////////////
	// server initialization
	function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "FineReaderOCR";
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// задать язык
   	function set_language($language="Russian English") 
   	{
		$params = array( "language" => $language);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	// задать путь к Fine Reader
   	function set_program_folder($path) 
   	{
		$params = array( "path" => $path);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	

	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// распознать картинку
   	function recognize($path) 
   	{
		$params = array( "path" => $path);
		return $this->call_get(__FUNCTION__,$params);
   	}    	
	// конвертировать файл
   	function convert($inpath,$outpath) 
   	{
		$params = array( "inpath" => $inpath , "outpath" => $outpath);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	

	/////////////////////////////////////////////////////////////////////////////////////////////////////
};
?>