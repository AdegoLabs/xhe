<?php
namespace Xhe;
class XheExcel extends XheBaseObject
{
	////////////////////////////////////// СЕРВИСНЫЕ ФУНКЦИИ ///////////////////////////////////////////
	// server initialization
	function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Excel";
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// создать файл
   	function create($path,$sheet_name,$header_datas="",$timeout=6000) 
   	{
		$params = array( "path" => $path , "sheet_name" => $sheet_name , "header_datas" => json_encode($header_datas));
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}    	

	// откроем файл для работы
   	function open($path,$read_only=true,$visibled=false,$timeout=3000,$password="") 
   	{
		$params = array( "path" => $path , "read_only" => $read_only , "visibled" => $visibled , "password" => $password);
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}    	
	// подключится к уже открытому excel (path_alias - любая строка, начинающаяся с @ - напримре "@doc1" )
   	function connect_by_hwnd($hwnd,$path_alias,$timeout=3000) 
   	{
		$params = array( "hwnd" => $hwnd , "path_alias" => $path_alias );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}    	
	// сохраним файл
   	function save($path,$timeout=3000,$password="") 
   	{
		$params = array( "path" => $path , "password" => $password );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}    	
	// закроем файл
   	function close($path) 
   	{
		$params = array( "path" => $path );
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	

	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// получить число листов
   	function get_sheets_count($path) 
   	{
		$params = array( "path" => $path );
		return $this->call_get(__FUNCTION__,$params);
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

	// получить содержимое заданного листа как массив
   	function get_sheet($path,$sheet,$timeout=3000,$only_visible=false,$use_value2=true) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "only_visible" => $only_visible , "use_value2" => $use_value2 );
		$res = $this->call_get(__FUNCTION__,$params,$timeout);
		if ($res=="")		
			return null;
		return json_decode($res);
   	}    	
	// задать содержимое листа
   	function set_sheet($path,$sheet,$sheet_array,$timeout=3000) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "sheet_array" => json_encode($sheet_array));
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
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

	// сортировать лист по столбцу
   	function sort_sheet($path,$sheet,$col,$is_ascending=true,$is_header_exists=false,$timeout=3000) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "col" => $col , "is_ascending" => $is_ascending, "is_header_exists" => $is_header_exists);
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}    	
	// убрать дубликаты строк в листе по всем или нескольким столбцам
   	function dedupe_sheet($path,$sheet,$use_cols="*",$timeout=3000) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet, "use_cols" => $use_cols);
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}    	

	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// получить число строк в листе
   	function get_rows_count($path,$sheet) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet );
		return $this->call_get(__FUNCTION__,$params);
   	}    	
	// добавить строку
   	function add_row($path,$sheet,$row_array) 
   	{		
		$params = array( "path" => $path , "sheet" => $sheet ,"row_array" => json_encode($row_array));
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	// получить строку как массив
   	function get_row($path,$sheet,$row,$use_value2=true) 
   	{		
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row , "use_value2" => $use_value2 );
		$res = $this->call_get(__FUNCTION__,$params);
		if ($res=="")		
			return null;
		return json_decode($res);
   	}    	
	// задать строку
   	function set_row($path,$sheet,$row,$row_array) 
   	{		
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row ,"row_array" => json_encode($row_array));
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	// добавить несколько строк
   	function add_rows($path,$sheet,$rows_array,$timeout=3000) 
   	{		
		$params = array( "path" => $path , "sheet" => $sheet ,"rows_array" => json_encode($rows_array));
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
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

	// задать числовой формат ячеек строки
   	function set_row_format($path,$sheet,$row,$format) 
   	{		
		$params = array( "path" => $path , "sheet" => $sheet ,"row" => $row, "format" => $format);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	// задать авторазмеры для строки
   	function autosize_row($path,$sheet,$row=-1,$timeout=3000) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}    	

	// показать строку
   	function show_row($path,$sheet,$row,$show=true) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row , "show" => $show );
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	// скрыта ли строка
   	function is_row_hidden($path,$sheet,$row) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row );
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	

	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// получить число столбцов в листе
   	function get_cols_count($path,$sheet,$row=-1) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row);
		return $this->call_get(__FUNCTION__,$params);
   	}    	
	// задать числовой формат ячеек столбца
   	function set_col_format($path,$sheet,$col,$format) 
   	{		
		$params = array( "path" => $path , "sheet" => $sheet ,"col" => $col, "format" => $format);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	// задать авторазмеры для столбца
   	function autosize_col($path,$sheet,$col="",$timeout=3000) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "col" => $col);
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}    	

	/////////////////////////////////////////////////////////////////////////////////////////////////////

        // прочитать текст заданной ячейки
   	function get_cell($path,$sheet,$row,$col,$use_value2=true) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row , "col" => $col , "use_value2" => $use_value2 );
		return $this->call_get(__FUNCTION__,$params);
   	}
        // задать текст заданной ячейки
   	function set_cell($path,$sheet,$row,$col,$text) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row , "col" => $col , "text" => $text );
		return $this->call_boolean(__FUNCTION__,$params);
   	}
	// задать числовой формат ячейки
   	function set_cell_format($path,$sheet,$row,$col,$format) 
   	{		
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row, "col" => $col, "format" => $format);
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	

        // объединить ячейки
   	function merge_cells($path,$sheet,$begin_address,$end_address) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "begin_address" => $begin_address , "end_address" => $end_address );
		return $this->call_boolean(__FUNCTION__,$params);
   	}
        // разъединить ячейки
   	function unmerge_cells($path,$sheet,$begin_address,$end_address) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "begin_address" => $begin_address , "end_address" => $end_address );
		return $this->call_boolean(__FUNCTION__,$params);
   	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// закрыть все открытые экземпляры Excel
   	function kill() 
   	{
		$params = array( );
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
	// конвертировать файл в другой формат xlsx,xls,csv,txt,html,pdf,xps (требует чтобы был установлен Excel не ниже 15 версии на компьютере)
   	function convert($inpath,$outpath,$timeout=3000) 
   	{
		$params = array( "inpath" => $inpath , "outpath" => $outpath );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}    	
	// экпортировать закладки в отдельный xlsx файлы
   	function export_sheets($path,$to_folder,$timeout=3000) 
   	{
		$params = array( "path" => $path , "to_folder" => $to_folder );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}    	
	// разбить закладку по строкам
   	function split_sheet_by_rows($path,$to_folder,$sheet_number,$rows_per_file,$timeout=3000) 
   	{
		$params = array( "path" => $path , "to_folder" => $to_folder , "sheet_number" => $sheet_number , "rows_per_file" => $rows_per_file );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}    	

	/////////////////////////////////////////////////////////////////////////////////////////////////////

        // выполниь макрос с заданным именем в файле
   	function run_macro_by_name($path, $active_sheet, $macro_name, $file_name="", $macro_args="") 
   	{
		if ($macro_args!="")
			$macro_args=json_encode($macro_args);
		$params = array( "path" => $path , "macro_name" => $macro_name , "active_sheet" => $active_sheet , "file_name" => $file_name, "macro_args" => $macro_args);
		return $this->call_boolean(__FUNCTION__,$params);
   	}

        // добавить макрос
   	function add_macro($path, $macro_name, $macro_code) 
   	{
		$params = array( "path" => $path , "macro_name" => $macro_name , "macro_code" => $macro_code);
		return $this->call_boolean(__FUNCTION__,$params);
   	}
        // добавить макрос из файла
   	function add_macro_from_file($path, $macro_name, $macro_file) 
   	{
		$params = array( "path" => $path , "macro_name" => $macro_name , "macro_file" => $macro_file);
		return $this->call_boolean(__FUNCTION__,$params);
   	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////

        // добавить ссылку
   	function add_link($path, $sheet, $row, $col, $text, $address, $tip = "") 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "row" => $row , "col" => $col , "text" => $text , "address" => $address, "tip" => $tip);
		return $this->call_boolean(__FUNCTION__,$params);
   	}

        // перейти по ссылке с заданным номером
   	function follow_link_by_number($path, $active_sheet, $number,$timeout=3000) 
   	{
		$params = array( "path" => $path , "active_sheet" => $active_sheet , "number" => $number );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}
        // перейти по ссылке с заданным текстом
   	function follow_link_by_text($path, $active_sheet, $text , $exactly = false, $skip = 0, $timeout=3000) 
   	{
		$params = array( "path" => $path , "active_sheet" => $active_sheet , "text" => $text , "exactly" => $exactly , "skip" => $skip );
		return $this->call_boolean(__FUNCTION__,$params,$timeout);
   	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////

        // получить позицию первой ячейки с заданным текстом
   	function get_pos_by_text($path,$sheet,$text,$exactly=true,$is_match_case=true,$col="",$timeout=3000)
	{ 
		$params = array( "path" => $path , "sheet" => $sheet , "text" => $text , "col" => $col , "is_match_case" => $is_match_case , "exactly" => $exactly );
	    	$res = explode(",",$this->call_get(__FUNCTION__,$params,$timeout));
		if (count($res)>=2)
			return new XhePosition($res[0],$res[1]);
		else
			return new XhePosition(-1,-1);
	}	
        // получить позицию всех ячеек с заданным текстом
   	function get_all_pos_by_text($path,$sheet,$text,$exactly=true,$is_match_case=true,$col="",$timeout=3000)
	{ 
		$params = array( "path" => $path , "sheet" => $sheet , "text" => $text , "col" => $col, "exactly" => $exactly , "is_match_case" => $is_match_case );
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

	// получить содержимое заданного диапазона листа как массив
   	function get_range($path,$sheet,$begin_cell,$end_cell,$timeout=3000) 
   	{
		$params = array( "path" => $path , "sheet" => $sheet , "begin_cell" => $begin_cell , "end_cell" => $end_cell );
		$res = $this->call_get(__FUNCTION__,$params,$timeout);
		if ($res=="")		
			return null;
		return json_decode($res);
   	}    	

	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// задать новый файл исходных данных для соединения
   	function set_connection_source_data_file_by_number($path,$number,$source_data_file_path) 
   	{		
		$params = array( "path" => $path , "number" => $number, "source_data_file_path" => $source_data_file_path );
		return $this->call_boolean(__FUNCTION__,$params);
   	}    	
};
?>