<?php
namespace Xhe;

class XheExcelFile extends XheBaseObject
{
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "ExcelFile";
	}
	
	   	function open($path) 
   	{
		$params = array( "path" => $path );
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	   	function save($path) 
   	{
		$params = array( "path" => $path );
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	   	function close($path) 
   	{
		$params = array( "path" => $path );
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	   	function convert($inpath,$outpath,$timeout=600) 
   	{
		$params = array( "inpath" => $inpath , "outpath" => $outpath );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}    	

	
	   	function get_sheets_count($path) 
   	{
		$params = array( "path" => $path );
		return $this->call_get(__FUNCTION__,$params);
   	}    	
	   	function add_sheet($path,$name) 
   	{
		$params = array( "path" => $path , "name" => $name);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
   	   	function get_sheet_number_by_name($path,$name,$exactly=true) 
   	{
		$params = array( "path" => $path , "name" => $name , "exactly" => $exactly);
		return $this->call_get(__FUNCTION__,$params);
   	}

	   	function get_active_sheet_number($path) 
   	{
		$params = array( "path" => $path );
		return $this->call_get(__FUNCTION__,$params);
   	}    	
	   	function set_active_sheet_by_number($path,$sheet) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet );
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	

	
	   	function get_rows_count($path,$sheet) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet );
		return $this->call_get(__FUNCTION__,$params);
   	}    	
	   	function get_cols_count($path,$sheet,$row=-1) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row);
		return $this->call_get(__FUNCTION__,$params);
   	}    	

	   	function get_sheet_name($path,$sheet) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet );
		return $this->call_get(__FUNCTION__,$params);
   	}    	
	   	function set_sheet_name($path,$sheet,$name) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "name" => $name);
		return $this->call_boolean(__FUNCTION__,$params);
   	}   

	   	function autosize_row($path,$sheet,$row=-1) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row );
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	   	function autosize_col($path,$sheet,$col="") 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "col" => $col);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	

	   	function get_row($path,$sheet,$row) 
   	{		
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row);
		$res = $this->call_get(__FUNCTION__,$params);
		if ($res=="")		
			return null;
		return json_decode($res);
   	}    	
	   	function set_row($path,$sheet,$row,$row_array) 
   	{		
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row,"row_array" => json_encode($row_array));
		return $this->call_boolean(__FUNCTION__,$params);
   	}    		 	

	   	function add_row($path,$sheet,$row_array) 
   	{		
		$params = array( "path" => $path , "sheet" => $sheet ,"row_array" => json_encode($row_array));
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	   	function insert_row($path,$sheet,$row,$count=1) 
   	{		
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row, "count" => $count);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	   	function remove_row($path,$sheet,$row) 
   	{		
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	   	function clear_row($path,$sheet,$row) 
   	{		
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	   	function copy_row($in_path,$in_sheet,$in_row,$out_path,$out_sheet,$out_row) 
   	{		
		$params = array( "in_path" => $in_path , "in_sheet" => $in_sheet , "in_row" => $in_row , "out_path" => $out_path , "out_sheet" => $out_sheet , "out_row" => $out_row);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	

           	function set_row_color($path,$sheet,$row,$color) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row , "color" => $color);
		return $this->call_boolean(__FUNCTION__,$params);
   	}
           	function set_row_background_color($path,$sheet,$row,$color) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row , "color" => $color);
		return $this->call_boolean(__FUNCTION__,$params);
   	}
           	function set_row_border($path,$sheet,$row,$color,$border_type=13,$aligment="all")
	{ 
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row , "color" => $color, "border_type" => $border_type, "aligment" => $aligment);
		return $this->call_boolean(__FUNCTION__,$params);
	}	

           	function set_col_color($path,$sheet,$col,$color) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "col" => $col , "color" => $color);
		return $this->call_boolean(__FUNCTION__,$params);
   	}
           	function set_col_background_color($path,$sheet,$col,$color) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "col" => $col , "color" => $color);
		return $this->call_boolean(__FUNCTION__,$params);
   	}
           	function set_col_border($path,$sheet,$col,$color,$border_type=13,$aligment="all")
	{ 
		$params = array( "path" => $path , "sheet" => $sheet , "col" => $col , "color" => $color, "border_type" => $border_type, "aligment" => $aligment);
		return $this->call_boolean(__FUNCTION__,$params);
	}	

           	function get_pos_by_text($path,$sheet,$text,$exactly=true,$col="",$timeout=600)
	{ 
		$params = array( "path" => $path , "sheet" => $sheet , "text" => $text , "col" => $col , "exactly" => $exactly );
	    	$res = explode(",",$this->call_get(__FUNCTION__,$params,$timeout));
		if (count($res)>=2)
			return new XhePosition($res[0],$res[1]);
		else
			return new XhePosition(-1,-1);
	}	
           	function get_all_pos_by_text($path,$sheet,$text,$exactly=true,$col="",$timeout=600)
	{ 
		$params = array( "path" => $path , "sheet" => $sheet , "text" => $text , "col" => $col, "exactly" => $exactly );
	    	$res=$this->call_get(__FUNCTION__,$params,$timeout);
		$result=array();
		if ($res!="")
		{			
			$resa = explode(";",$res);
			for ($i=0;$i<count($resa);$i++)
			{
				$resi = explode(",",$resa[$i]);
				if (count($resi)>=2)
					array_push($result,new XhePosition($resi[0],$resi[1]));
			}
		}
		return $result;
	}	

	
	   	function read_sheet($path,$sheet) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet );
		return $this->call_get(__FUNCTION__,$params);
   	}    	

	   	function add_cell($path,$sheet,$row,$text) 
   	{		
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row, "text" => $text);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
           	function get_cell($path,$sheet,$row,$col) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row , "col" => $col );
		return $this->call_get(__FUNCTION__,$params);
   	}
           	function set_cell($path,$sheet,$row,$col,$text) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row , "col" => $col , "text" => $text);
		return $this->call_boolean(__FUNCTION__,$params);
   	}
           	function clear_cell($path,$sheet,$row,$col) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row , "col" => $col );
		return $this->call_boolean(__FUNCTION__,$params);
   	}

           	function get_cell_type($path,$sheet,$row,$col) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row , "col" => $col );
		return $this->call_get(__FUNCTION__,$params);
   	}
           	function set_cell_type($path,$sheet,$row,$col,$type_) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row , "col" => $col , "type" => $type_);
		return $this->call_boolean(__FUNCTION__,$params);
   	}

           	function set_cell_color($path,$sheet,$row,$col,$color) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row , "col" => $col , "color" => $color);
		return $this->call_boolean(__FUNCTION__,$params);
   	}
           	function set_cell_background_color($path,$sheet,$row,$col,$color) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row , "col" => $col , "color" => $color);
		return $this->call_boolean(__FUNCTION__,$params);
   	}
           	function set_cell_border($path,$sheet,$row,$col,$color,$border_type=13,$aligment="all")
	{ 
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row , "col" => $col , "color" => $color, "border_type" => $border_type, "aligment" => $aligment);
		return $this->call_boolean(__FUNCTION__,$params);
	}	

           	function get_merged_cell_range($path,$sheet,$row,$col) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row , "col" => $col );		
		$res =  $this->call_get(__FUNCTION__,$params);
		if ($res!="")
		{
			$resa=explode(";",$res);
			return new XheRange($resa[0],$resa[1],$resa[2],$resa[3]);
		}
		else
			return false;
   	}

	};
?>