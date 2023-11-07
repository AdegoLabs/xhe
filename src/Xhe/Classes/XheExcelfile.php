<?php
namespace Xhe;
class XheExcelFile extends XheExcelFileCompatible
{
	////////////////////////////////////// СЕРВИСНЫЕ ФУНКЦИИ ///////////////////////////////////////////
	// server initialization
	function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "ExcelFile";
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// создать файл
   	function create($path,$sheet_name,$header_datas="",$timeout=6000) 
   	{
		$params = array( "path" => $path , "sheet_name" => $sheet_name , "header_datas" => json_encode($header_datas));
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}    	
	// откроем файл для работы
   	function open($path,$timeout=3000,$is_wait_busy=false,$wait_busy_seconds=180) 
   	{
		$params = array( "path" => $path , "is_wait_busy" => $is_wait_busy , "wait_busy_seconds" => $wait_busy_seconds );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}    	
	// открыт ли файл
   	function is_opened($path) 
   	{
		$params = array( "path" => $path );
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	// сохраним файл
   	function save($path,$timeout=3000) 
   	{
		$params = array( "path" => $path );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}    	
	// закроем файл
   	function close($path) 
   	{
		$params = array( "path" => $path );
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
        // вытащить картинки из docx файла
   	function extract_images($path,$to_folder) 
   	{
		$params = array( "path" => $path , "to_folder" => $to_folder );
		return $this->call_boolean(__FUNCTION__,$params);
   	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// получить число листов
   	function get_sheets_count($path) 
   	{
		$params = array( "path" => $path );
		return $this->call_get(__FUNCTION__,$params);
   	}    	
	// получить число листов
   	function add_sheet($path,$name) 
   	{
		$params = array( "path" => $path , "name" => $name);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	

	// удалить лист по номеру
   	function remove_sheet_by_number($path,$number) 
   	{
		$params = array( "path" => $path , "number" => $number);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	// удалить лист по имени
   	function remove_sheet_by_name($path,$name) 
   	{
		$params = array( "path" => $path , "name" => $name);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	

   	// получить номер по имени листа
   	function get_sheet_number_by_name($path,$name,$exactly=true) 
   	{
		$params = array( "path" => $path , "name" => $name , "exactly" => $exactly);
		return $this->call_get(__FUNCTION__,$params);
   	}

	// получить активный лист
   	function get_active_sheet_number($path) 
   	{
		$params = array( "path" => $path );
		return $this->call_get(__FUNCTION__,$params);
   	}    	
	// задать активный лист
   	function set_active_sheet_by_number($path,$sheet) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet );
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	// получить содержимое заданного листа
   	function read_sheet($path,$sheet,$timeout=3000) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet );
		return $this->call_get(__FUNCTION__,$params,$timeout);
   	}    	
	// получить содержимое заданного листа как массив
   	function get_sheet($path,$sheet,$timeout=3000) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet );
		$res = $this->call_get(__FUNCTION__,$params,$timeout);
		if ($res=="")		
			return null;
		return json_decode($res);
   	}    	
	// получить имя листа
   	function get_sheet_name($path,$sheet) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet );
		return $this->call_get(__FUNCTION__,$params);
   	}    	
	// задать имя листа
   	function set_sheet_name($path,$sheet,$name) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "name" => $name);
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// очистить ячейки на заданном листе
   	function clear_sheet($path,$sheet) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet);
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// задать цвет ячеек листа
   	function set_sheet_color($path,$sheet,$color) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "color" => $color);
		return $this->call_boolean(__FUNCTION__,$params);
   	}   

	// сортировать лист по одному или нескольким столбцам
   	function sort_sheet($path,$sheet,$cols,$is_ascending=true,$is_header_exists=false,$timeout=3000) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "cols" => $cols , "is_ascending" => $is_ascending, "is_header_exists" => $is_header_exists);
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}    	
	// убрать дубликаты
   	function dedupe_sheet($path,$sheet,$use_cols="*",$is_header_exists=false,$timeout=3000) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "use_cols" => $use_cols , "is_header_exists" => $is_header_exists);
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}    	

	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// получить число строк в листе
   	function get_rows_count($path,$sheet,$only_used=false) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "only_used" => $only_used);
		return $this->call_get(__FUNCTION__,$params);
   	}    	

	// получить строку как массив
   	function get_row($path,$sheet,$row) 
   	{		
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row);
		$res = $this->call_get(__FUNCTION__,$params);
		if ($res=="")		
			return null;
		return json_decode($res);
   	}    	
	// заполнить строку из массива
   	function set_row($path,$sheet,$row,$row_array) 
   	{		
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row,"row_array" => json_encode($row_array));
		return $this->call_boolean(__FUNCTION__,$params);
   	}    		 	

	// добавить строку
   	function add_row($path,$sheet,$row_array) 
   	{		
		$params = array( "path" => $path , "sheet" => $sheet ,"row_array" => json_encode($row_array));
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	// вставить строку
   	function insert_row($path,$sheet,$row,$count=1) 
   	{		
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row, "count" => $count);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	// убрать строку
   	function remove_row($path,$sheet,$row) 
   	{		
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	

	// убрать строки по номеру
   	function remove_rows_by_number($path,$sheet,$row,$count) 
   	{		
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row, "count" => $count);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	// убрать строки по тексту
   	function remove_rows_by_text($path,$sheet,$text,$col="") 
   	{		
		$params = array( "path" => $path , "sheet" => $sheet , "text" => $text , "col" => $col );
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	// убрать строки по диапазонам, например "1-10,20-100"
   	function remove_rows_by_ranges($path,$sheet,$ranges) 
   	{		
		$params = array( "path" => $path , "sheet" => $sheet , "ranges" => $ranges );
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	

	// очистить строку
   	function clear_row($path,$sheet,$row) 
   	{		
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	// копировать строку
   	function copy_row($in_path,$in_sheet,$in_row,$out_path,$out_sheet,$out_row) 
   	{		
		$params = array( "in_path" => $in_path , "in_sheet" => $in_sheet , "in_row" => $in_row , "out_path" => $out_path , "out_sheet" => $out_sheet , "out_row" => $out_row);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	

	// добавить столбец
   	function add_col($path,$sheet,$col_array) 
   	{		
		$params = array( "path" => $path , "sheet" => $sheet ,"col_array" => json_encode($col_array));
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	// вставить столбец
   	function insert_col($path,$sheet,$col,$count=1) 
   	{		
		$params = array( "path" => $path , "sheet" => $sheet , "col" => $col, "count" => $count);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	// убрать столбец
   	function remove_col($path,$sheet,$col) 
   	{		
		$params = array( "path" => $path , "sheet" => $sheet , "col" => $col);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	// очистить столбец
   	function clear_col($path,$sheet,$col) 
   	{		
		$params = array( "path" => $path , "sheet" => $sheet , "col" => $col);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	

        // задать цвет заданной ячейки для всей строки
   	function set_row_color($path,$sheet,$row,$color) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row , "color" => $color);
		return $this->call_boolean(__FUNCTION__,$params);
   	}
        // задать цвет фона заданной ячейки для всей строки
   	function set_row_background_color($path,$sheet,$row,$color) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row , "color" => $color);
		return $this->call_boolean(__FUNCTION__,$params);
   	}
        // задать тип и цвет границы заданной ячейки для всей строки
   	function set_row_border($path,$sheet,$row,$color,$border_type=13,$aligment="all")
	{ 
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row , "color" => $color, "border_type" => $border_type, "aligment" => $aligment);
		return $this->call_boolean(__FUNCTION__,$params);
	}	
	// задать авторазмеры для строки
   	function autosize_row($path,$sheet,$row=-1,$timeout=3000) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}    	

	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// получить число столбцов в листе
   	function get_cols_count($path,$sheet,$row=-1,$only_used=false) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row, "only_used" => $only_used);
		return $this->call_get(__FUNCTION__,$params);
   	}    	
	// задать авторазмеры для столбца
   	function autosize_col($path,$sheet,$col="",$timeout=3000) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "col" => $col);
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}    	

        // задать цвет заданной ячейки для всего столбца
   	function set_col_color($path,$sheet,$col,$color) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "col" => $col , "color" => $color);
		return $this->call_boolean(__FUNCTION__,$params);
   	}
        // задать цвет фона заданной ячейки для всего столбца
   	function set_col_background_color($path,$sheet,$col,$color) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "col" => $col , "color" => $color);
		return $this->call_boolean(__FUNCTION__,$params);
   	}
        // задать тип и цвет границы заданной ячейки для всего столбца
   	function set_col_border($path,$sheet,$col,$color,$border_type=13,$aligment="all")
	{ 
		$params = array( "path" => $path , "sheet" => $sheet , "col" => $col , "color" => $color, "border_type" => $border_type, "aligment" => $aligment);
		return $this->call_boolean(__FUNCTION__,$params);
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////	

	// добавить ячейку
   	function add_cell($path,$sheet,$row,$text) 
   	{		
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row, "text" => $text);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
        // прочитать текст заданной ячейки
   	function get_cell($path,$sheet,$row,$col) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row , "col" => $col );
		return $this->call_get(__FUNCTION__,$params);
   	}
        // прочитать текст заданной ячейки
   	function set_cell($path,$sheet,$row,$col,$text,$type="") 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row , "col" => $col , "text" => $text, "type" => $type);
		return $this->call_boolean(__FUNCTION__,$params);
   	}
        // очистить заданную ячейку
   	function clear_cell($path,$sheet,$row,$col) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row , "col" => $col );
		return $this->call_boolean(__FUNCTION__,$params);
   	}

        // прочитать тип заданной ячейки
   	function get_cell_type($path,$sheet,$row,$col) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row , "col" => $col );
		return $this->call_get(__FUNCTION__,$params);
   	}
        // задать тип заданной ячейки
   	function set_cell_type($path,$sheet,$row,$col,$type_) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row , "col" => $col , "type" => $type_);
		return $this->call_boolean(__FUNCTION__,$params);
   	}

        // задать цвет заданной ячейки
   	function set_cell_color($path,$sheet,$row,$col,$color) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row , "col" => $col , "color" => $color);
		return $this->call_boolean(__FUNCTION__,$params);
   	}
        // задать цвет фона заданной ячейки
   	function set_cell_background_color($path,$sheet,$row,$col,$color) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row , "col" => $col , "color" => $color);
		return $this->call_boolean(__FUNCTION__,$params);
   	}
        // задать тип и цвет границы заданной ячейки
   	function set_cell_border($path,$sheet,$row,$col,$color,$border_type=13,$aligment="all")
	{ 
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row , "col" => $col , "color" => $color, "border_type" => $border_type, "aligment" => $aligment);
		return $this->call_boolean(__FUNCTION__,$params);
	}	

        // получить шрифт заданной ячейки
   	function get_cell_font($path,$sheet,$row,$col) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row , "col" => $col);
		$res = $this->call_get(__FUNCTION__,$params);
		if ($res=="")
			return null;
		else
			return json_decode($res);
   	}
        // задать шрифт заданной ячейки
   	function set_cell_font($path,$sheet,$row,$col,$font) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row , "col" => $col , "font" => json_encode($font));
		return $this->call_boolean(__FUNCTION__,$params);
   	}

        // получить диапазон объединенной ячейки
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
        // получить позицию первой ячейки с заданным текстом
   	function get_pos_by_text($path,$sheet,$text,$exactly=true,$col="",$timeout=3000)
	{ 
		$params = array( "path" => $path , "sheet" => $sheet , "text" => $text , "col" => $col , "exactly" => $exactly );
	    	$res = explode(",",$this->call_get(__FUNCTION__,$params,$timeout));
		if (count($res)>=2)
			return new XhePosition($res[0],$res[1]);
		else
			return new XhePosition(-1,-1);
	}	
        // получить позицию всех ячеек с заданным текстом
   	function get_all_pos_by_text($path,$sheet,$text,$exactly=true,$col="",$timeout=3000)
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

	/////////////////////////////////////////////////////////////////////////////////////////////////////

        // добавить ссылку
   	function add_link($path, $sheet, $row, $col, $text, $address, $tip = "") 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row , "col" => $col , "text" => $text , "address" => $address, "tip" => $tip);
		return $this->call_boolean(__FUNCTION__,$params);
   	}

};
?>