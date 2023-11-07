<?php
namespace Xhe;
class XheWord extends XheBaseObject
{
	////////////////////////////////////// СЕРВИСНЫЕ ФУНКЦИИ ///////////////////////////////////////////
	// server initialization
	function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Word";
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// создать документ word
   	function create($path,$text="") 
   	{
		$params = array( "path" => $path , "text" => $text );
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	// открыть документ word
   	function open($path,$read_only,$timeout=3000) 
   	{
		$params = array( "path" => $path , "read_only" => $read_only );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}    	
	// подключится к уже открытому word (path_alias - любая строка, начинающаяся с @ - напримре "@doc1" )
   	function connect_by_hwnd($hwnd,$path_alias,$timeout=3000) 
   	{
		$params = array( "hwnd" => $hwnd , "path_alias" => $path_alias );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
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
	// закрыть все процессы word
   	function kill() 
   	{
		$params = array(  );
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	

        // конвертировать в в другой формат
   	function convert($inpath,$outpath,$timeout=3000)   
   	{
		$params = array( "inpath" => $inpath , "outpath" => $outpath );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}
        // сравнить 2 документа
   	function compare($inpath1,$inpath2,$timeout=3000)   
   	{
		$params = array( "inpath1" => $inpath1 , "inpath2" => $inpath2 );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}

	// получить число страниц в файле
   	function get_page_count($path) 
   	{
		$params = array( "path" => $path );
		return $this->call_get(__FUNCTION__,$params);
   	}    	
	// экспортировать страницы в pdf или xps
   	function export_pages($inpath, $outpath, $from_page , $count = 1,$timeout=3000)  
   	{
		$params = array( "inpath" => $inpath , "outpath" => $outpath , "from_page" => $from_page , "count" => $count );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}    	
	// экспортировать все страницы
   	function export_all_pages($inpath, $to_folder, $ext = "pdf",$filters="",$is_match_all=false,$timeout=3000)  
   	{
		$params = array( "inpath" => $inpath , "to_folder" => $to_folder , "ext" => $ext , "filters" => json_encode($filters) , "is_match_all" => $is_match_all );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}    	

	// добавим текст в файл
   	function add_text($path,$text,$to_new_paragraph=false,$font=null,$color="") 
   	{
		$params = array( "path" => $path , "text" => $text , "to_new_paragraph" => $to_new_paragraph );
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	// получить текст всего файла
   	function get_text($path) 
   	{
		$params = array( "path" => $path );
		return $this->call_get(__FUNCTION__,$params);
   	}    	

	// получить количество параграфов
   	function get_paragraphs_count($path) 
   	{
		$params = array( "path" => $path );
		return $this->call_get(__FUNCTION__,$params);
   	}    	
	// получить текст параграфа по номеру
   	function get_paragraph_text_by_number($path,$number) 
   	{
		$params = array( "path" => $path , "number" => $number );
		return $this->call_get(__FUNCTION__,$params);
   	}    	
	// задать текст параграфа по номеру
   	function set_paragraph_text_by_number($path,$number,$text) 
   	{
		$params = array( "path" => $path , "number" => $number , "text" => $text );
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	// получить номер параграфа по тексту
   	function get_paragraph_number_by_text($path,$text,$exactly=false,$skip=0) 
   	{
		$params = array( "path" => $path , "text" => $text , "exactly" => $exactly , "skip" => $skip );
		return $this->call_get(__FUNCTION__,$params);
   	}    	
	// удалить параграф по номеру
   	function delete_paragraph_by_number($path,$number) 
   	{
		$params = array( "path" => $path , "number" => $number );
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	// удалить параграф по тексту
   	function delete_paragraph_by_text($path,$text,$exactly=false,$skip=0) 
   	{
		$params = array( "path" => $path , "text" => $text , "exactly" => $exactly , "skip" => $skip );
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	

	// получить количество таблиц
   	function get_tables_count($path) 
   	{
		$params = array( "path" => $path );
		return $this->call_get(__FUNCTION__,$params);
   	}    	
	// добавим таблицу в файл
   	function add_table($path,$table) 
   	{
		$params = array( "path" => $path , "table" => json_encode($table) );
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	

	// добавим картинку в файл
   	function add_image($path,$image_path) 
   	{
		$params = array( "path" => $path , "image_path" => $image_path );
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	

	// получить количество фигур
   	function get_shapes_count($path) 
   	{
		$params = array( "path" => $path );
		return $this->call_get(__FUNCTION__,$params);
   	}    	

  	/////////////////////////////////////////////////////////////////////////////////////////////////////
};
?>