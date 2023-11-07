<?php
namespace Xhe;
class XheWordfile extends XheWordfileCompatible
{
	////////////////////////////////////// СЕРВИСНЫЕ ФУНКЦИИ ///////////////////////////////////////////
	// server initialization
	function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "WordFile";
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// создать документ word (docx)
   	function create($path,$text="") 
   	{
		$params = array( "path" => $path , "text" => $text );
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	// открыть документ word
   	function open($path,$is_read_only = true) 
   	{
		$params = array( "path" => $path , "is_read_only" => $is_read_only );
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	// сохранить ранее открытый документ word
   	function save($path) 
   	{
		$params = array( "path" => $path );
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	// закрыть ранее открытый документ word
   	function close($path) 
   	{
		$params = array( "path" => $path );
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	

	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// получить число таблиц в файле (только для docx)
   	function get_table_count($path) 
   	{
		$params = array( "path" => $path );
		return $this->call_get(__FUNCTION__,$params);
   	}    	

	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// прочитать Word файл как текст (только для docx)
   	function read($path) 
   	{
		$params = array( "path" => $path );
		return $this->call_get(__FUNCTION__,$params);
   	}    	
   	// прочитать таблицу по номеру в Word файле (только для docx)
   	function get_table_by_number($path,$number,$as_array=false) 
   	{
		$params = array( "path" => $path , "number" => $number, "as_array" => $as_array );
		$res = $this->call_get(__FUNCTION__,$params);
		if (!$as_array)
			return $res;
		if ($res=="")
			return null;
		return json_decode($res);
   	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////

        // вытащить картинки из docx файла
   	function extract_images($path,$to_folder) 
   	{
		$params = array( "path" => $path , "to_folder" => $to_folder );
		return $this->call_boolean(__FUNCTION__,$params);
   	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// получить количество фигур
   	function get_shapes_count($path) 
   	{
		$params = array( "path" => $path );
		return $this->call_get(__FUNCTION__,$params);
   	}    	
	// получить свойства фигуры (xml)
   	function get_shape_properties($path,$number) 
   	{
		$params = array( "path" => $path , "number" => $number);
		return $this->call_get(__FUNCTION__,$params);
   	}    	

	/////////////////////////////////////////////////////////////////////////////////////////////////////
};
?>