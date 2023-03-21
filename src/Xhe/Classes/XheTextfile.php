<?php

namespace Xhe;

class XheTextFile extends XheBaseObject {
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "TextFile";
	}
	
	
	   	function get_file_folder($path,$timeout=-1) 
   	{
		$params = array( "path" => $path );
		return $this->call_get(__FUNCTION__,$params,$timeout);
   	}    	
   	   	function get_lines_count($path,$timeout=-1) 
   	{
		$params = array( "path" => $path );
		return $this->call_get(__FUNCTION__,$params,$timeout);
   	}

	
	   	function create_folder($path,$timeout=-1)
   	{
		$params = array( "path" => $path );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}
	   	function generate_folders_by_strings_file($file,$folder,$timeout=-1) 
   	{
		$params = array( "file" => $file , "folder" => $folder );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}    	

	   	function get_all_files_in_folder($path,$file="",$include_subfolders=false,$only_folders=false,$timeout=-1,$extension="")
   	{
		$params = array( "path" => $path , "file" => $file , "include_subfolders" => $include_subfolders , "only_folders" => $only_folders , "extension" => $extension );
		return $this->call_get(__FUNCTION__,$params,$timeout);
   	}
   		function collect_from_folders_to_file($infolderpath,$outfilepath,$timeout=-1,$extension="txt")
   	{
		$params = array( "infolderpath" => $infolderpath , "outfilepath" => $outfilepath , "extension" => $extension  );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}

	
  	        function split_to_part($infilepath,$outfilepath,$numparts,$timeout=-1) 
   	{
		$params = array( "infilepath" => $infilepath , "outfilepath" => $outfilepath , "numparts" => $numparts );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}	
   	   	function collect_from_folders_to_folder($infolderpath,$outfolderpath,$timeout=-1)
   	{
		$params = array( "infolderpath" => $infolderpath , "outfolderpath" => $outfolderpath);
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}

	
	   	function sort($infilepath,$outfilepath,$timeout=-1)
   	{
		$params = array( "infilepath" => $infilepath , "outfilepath" => $outfilepath);
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}
  	   	function dedupe($infilepath,$outfilepath,$timeout=-1)
   	{
		$params = array( "infilepath" => $infilepath , "outfilepath" => $outfilepath);
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}
	   	function randomize_to($infilepath,$outfilepath,$timeout=-1)
   	{
		$params = array( "infilepath" => $infilepath , "outfilepath" => $outfilepath);
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}
	   	function revert_strings_file($infile,$outfile,$timeout=-1) 
   	{
		$params = array( "infile" => $infile , "outfile" => $outfile );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}    	
	   	function replace_string($infile,$outfile,$old_str,$new_str,$timeout=-1) 
   	{
		$params = array( "infile" => $infile , "outfile" => $outfile , "old_str" => $old_str , "new_str" => $new_str);
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}    	
	   	function exclude_strings_file_from_file($infile,$excluding_file,$outfile,$timeout=-1) 
   	{
		$params = array( "infile" => $infile , "excluding_file" => $excluding_file , "outfile" => $outfile );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}    	
	   	function file_links($infilepath,$outfilepath,$num_lines,$type_make="L",$timeout=-1)
   	{
		$params = array( "infilepath" => $infilepath , "outfilepath" => $outfilepath , "num_lines" => $num_lines , "type_make" => $type_make );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}
	
     	   	function write_file($file,$content,$timeout=-1,$create_folders=false,$encoding="") 
   	{
		$params = array( "file" => $file , "content" => $content , "create_folders" => $create_folders , "encoding" => $encoding);
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}
           	function add_string_to_file($file,$str,$timeout=-1) 
   	{
		$params = array( "file" => $file , "str" => $str );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}
           	function set_string_to_file($file,$str,$line,$add=true,$timeout=-1) 
   	{
		$params = array( "file" => $file , "str" => $str , "line" => $line , "add" => $add );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}
  	   	function read_file($file,$timeout=-1,$encoding="windows-1251") 
   	{
		$params = array( "file" => $file , "encoding" => $encoding );
		$res=$this->call_get(__FUNCTION__,$params,$timeout);
				/*global $bUTF8Ver;
		if ($bUTF8Ver)
			$res_1251=iconv($encoding, "utf-8", $res);
		else
			$res_1251=iconv($encoding, "windows-1251", $res);*/
		return $res;
   	}

	
           	function get_line_from_file($file,$rand,$line,$timeout=-1) 
   	{
		$params = array( "file" => $file , "rand" => $rand , "line" => $line );
		return $this->call_get(__FUNCTION__,$params,$timeout);
   	}
           	function delete_line_from_file($file,$line,$timeout=-1) 
   	{
		$params = array( "file" => $file , "line" => $line );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}
           	function get_lines_from_file($file,$beg_line,$lines_count,$timeout=-1) 
   	{
		$params = array( "file" => $file , "beg_line" => $beg_line , "lines_count" => $lines_count );
		return $this->call_get(__FUNCTION__,$params,$timeout);
   	}

	};
?>