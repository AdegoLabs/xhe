<?php
namespace Xhe;

class XhePdfFile extends XheBaseObject
{
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "PDFFile";
	}
	
	   	function get_info($path,$name) 
   	{
		$params = array( "path" => $path , "name" => $name);
		return $this->call_get(__FUNCTION__,$params);
   	}    	
	   	function get_page_count($path) 
   	{
		$params = array( "path" => $path );
		return $this->call_get(__FUNCTION__,$params);
   	}    	

	
	   	function read($path) 
   	{
		$params = array( "path" => $path );
		return $this->call_get(__FUNCTION__,$params);
   	}    	
   	   	function read_page($path,$page) 
   	{
		$params = array( "path" => $path , "page" => $page);
		return $this->call_get(__FUNCTION__,$params);
   	}

	
           	function write($path,$content) 
   	{
		$params = array( "path" => $path , "content" => $content );
		return $this->call_boolean(__FUNCTION__,$params);
   	}
           	function combine($outpath,$inpaths,$is_compressed=false) 
   	{
		$paths="";
		foreach($inpaths as $path)
			$paths.=$path."\n";
		$params = array( "outpath" => $outpath , "inpaths" => $paths , "is_compressed" => $is_compressed );
		return $this->call_boolean(__FUNCTION__,$params,600);       
   	}
           	function extract_images($path,$to_folder) 
   	{
		$params = array( "path" => $path , "to_folder" => $to_folder );
		return $this->call_boolean(__FUNCTION__,$params);
   	}
           	function compress_images($inpath,$outpath,$quality=20) 
   	{
		$params = array( "inpath" => $inpath , "outpath" => $outpath , "quality" => $quality );
		return $this->call_boolean(__FUNCTION__,$params,600);       
   	}
        /*   	function remove_images($inpath,$outpath) 
   	{
		$params = array( "inpath" => $inpath , "outpath" => $outpath );
		return $this->call_boolean(__FUNCTION__,$params,600);       
   	}*/

	};
?>