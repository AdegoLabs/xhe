<?php
namespace Xhe;
class XhePdffile extends XheBaseObject
{
	////////////////////////////////////// СЕРВИСНЫЕ ФУНКЦИИ ///////////////////////////////////////////
	// server initialization
	function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "PDFFile";
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// получить информацию о Pdf
   	function get_info($path,$name) 
   	{
		$params = array( "path" => $path , "name" => $name);
		return $this->call_get(__FUNCTION__,$params);
   	}    	
	// получить число страниц в Pdf
   	function get_page_count($path) 
   	{
		$params = array( "path" => $path );
		return $this->call_get(__FUNCTION__,$params);
   	}    	
	// получить число картинок в Pdf
   	function get_images_count($path) 
   	{
		$params = array( "path" => $path );
		return $this->call_get(__FUNCTION__,$params);
   	}    	
	// получить число ссылок в Pdf
   	function get_links_count($path) 
   	{
		$params = array( "path" => $path );
		return $this->call_get(__FUNCTION__,$params);
   	}    	
	// получить ссылку с заданным номером в Pdf
   	function get_link_by_number($path,$number) 
   	{
		$params = array( "path" => $path , "number" => $number);
		return $this->call_get(__FUNCTION__,$params);
   	}    	
	// получить все ссылки в pdf
   	function get_all_links($path) 
   	{
		$params = array( "path" => $path );
		$res =  $this->call_get(__FUNCTION__,$params);
		if ($res=="")		
			return null;
		return json_decode($res);
   	}    	

	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// прочитать Pfd файл как текст
   	function read($path) 
   	{
		$params = array( "path" => $path );
		return $this->call_get(__FUNCTION__,$params);
   	}    	
   	// прочитать страницу в Pfd файле как текст
   	function read_page($path,$page) 
   	{
		$params = array( "path" => $path , "page" => $page);
		return $this->call_get(__FUNCTION__,$params);
   	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////

        // записать текст в Pdf
   	function write($path,$content) 
   	{
		$params = array( "path" => $path , "content" => $content );
		return $this->call_boolean(__FUNCTION__,$params);
   	}
        // комбинировать Pdf файлы
   	function combine($outpath,$inpaths,$is_compressed=false,$timeout=6000) 
   	{
		$paths="";
		foreach($inpaths as $path)
			$paths.=$path."\n";
		$params = array( "outpath" => $outpath , "inpaths" => $paths , "is_compressed" => $is_compressed );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}
        // вытащить картинки из Pdf
   	function extract_images($path,$to_folder,$timeout=6000) 
   	{
		$params = array( "path" => $path , "to_folder" => $to_folder );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}
        // сжать картинки в Pdf файле
   	function compress_images($inpath,$outpath,$quality=20,$timeout=6000)
   	{
		$params = array( "inpath" => $inpath , "outpath" => $outpath , "quality" => $quality );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);       
   	}
        // распечать Pdf файл в картинки
   	function print_pages($path,$to_folder,$scale=1,$timeout=6000)
   	{
		$params = array( "path" => $path , "to_folder" => $to_folder , "scale" => $scale );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);       
   	}
        // разбить PDF файл постранично
   	function split($path,$to_folder,$pages_per_file=1,$timeout=6000) 
   	{
		$params = array( "path" => $path , "to_folder" => $to_folder , "pages_per_file" => $pages_per_file );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////
};
?>