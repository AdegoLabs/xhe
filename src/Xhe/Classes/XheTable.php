<?php

namespace Xhe;

class XheTable extends XheTableCompatible
{
			function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Table";
	}
	
	
        	function export_to_csv($file_path,$number,$rows="",$cols="",$as_html=true,$separator=";",$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "file_path" => $file_path , "number" => $number , "rows" => $rows , "cols" => $cols , "as_html" => $as_html , "separator" => $separator , "frame" => $frame);
		return $this->call_boolean(__FUNCTION__,$params);
	}
        	function export_to_xml($file_path,$number,$rows="",$cols="",$as_html=true,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "file_path" => $file_path , "number" => $number , "rows" => $rows , "cols" => $cols , "as_html" => $as_html , "frame" => $frame);
		return $this->call_boolean(__FUNCTION__,$params);
	}

	
		function get_cells_by_number($number,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "frame" => $frame);
		return $this->call_get(__FUNCTION__,$params);
	}
		function get_rows_by_number($number,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "frame" => $frame);
		return $this->call_get(__FUNCTION__,$params);
	}
		function get_cols_by_number($number,$frame=-1,$row=0)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "frame" => $frame, "row" => $row);
		return $this->call_get(__FUNCTION__,$params);
	}

        	function get_cell_by_number($number,$row,$col,$as_html=false,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "row" => $row , "col" => $col , "as_html" => $as_html , "frame" => $frame);
		return $this->call_get(__FUNCTION__,$params);
	}
		function get_cell_by_pos_by_number($number,$pos,$as_html=false,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "pos" => $pos , "as_html" => $as_html , "frame" => $frame);
		return $this->call_get(__FUNCTION__,$params);
	}

		function get_row_by_number($number,$row,$as_html=false,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "row" => $row , "as_html" => $as_html , "frame" => $frame);
		return $this->call_get(__FUNCTION__,$params);
	}
		function get_col_by_number($number,$col,$as_html=false,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "col" => $col , "as_html" => $as_html , "frame" => $frame);
		return $this->call_get(__FUNCTION__,$params);
	}
        	function get_rows_cols_by_number($number,$rows,$cols,$as_html=false,$separator="<br>",$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "rows" => $rows , "cols" => $cols , "as_html" => $as_html , "separator" => $separator , "frame" => $frame);
		return $this->call_get(__FUNCTION__,$params);
	}

	
		function get_cell_x_by_number($number,$row,$col,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "row" => $row , "col" => $col , "frame" => $frame);
		return $this->call_get(__FUNCTION__,$params);
	}
		function get_cell_x_by_inner_text($inner_text,$exactly,$row,$col,$frame=-1)
	{
		$this->wait_element_exist_by_inner_text($inner_text,$exactly,$frame);		

		$params = array( "inner_text" => $inner_text , "exactly" => $exactly , "row" => $row , "col" => $col , "frame" => $frame);
		return $this->call_get(__FUNCTION__,$params);
	}
		function get_cell_x_by_attribute($attr_name,$attr_value,$exactly,$row,$col,$frame=-1)
	{
		$this->wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);		

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "row" => $row , "col" => $col , "frame" => $frame);
		return $this->call_get(__FUNCTION__,$params);
	}

        	function get_cell_y_by_number($number,$row,$col,$frame=-1)
	{
		$this->wait_element_exist_by_number($number,$frame);		

		$params = array( "number" => $number , "row" => $row , "col" => $col , "frame" => $frame);
		return $this->call_get(__FUNCTION__,$params);
	}
		function get_cell_y_by_inner_text($inner_text,$exactly,$row,$col,$frame=-1)
	{
		$this->wait_element_exist_by_inner_text($inner_text,$exactly,$frame);		

		$params = array( "inner_text" => $inner_text , "exactly" => $exactly , "row" => $row , "col" => $col , "frame" => $frame);
		return $this->call_get(__FUNCTION__,$params);
	}
		function get_cell_y_by_attribute($attr_name,$attr_value,$exactly,$row,$col,$frame=-1)
	{
		$this->wait_element_exist_by_attribute($attr_name,$attr_value,$exactly,$frame);		

		$params = array( "attr_name" => $attr_name , "attr_value" => $attr_value , "exactly" => $exactly , "row" => $row , "col" => $col , "frame" => $frame);
		return $this->call_get(__FUNCTION__,$params);
	}

	};	
?>