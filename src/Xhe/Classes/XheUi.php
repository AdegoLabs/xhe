<?php
namespace Xhe;
class XheUi extends XheBaseObject
{
	/////////////////////////////////////// SERVICE VARIABLES ///////////////////////////////////////////
	// inner number
	var $inner_number;
	/////////////////////////////////////// SERVICE FUNCTIONS ///////////////////////////////////////////
	// server initialization
	function __construct($inner_number,$server,$password="")
	{    
		$this->inner_number = $inner_number;
		$this->server = $server;
		$this->password = $password;
		$this->prefix = "Ui";
	}
  	function __destruct() 
	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_boolean(__FUNCTION__,$params);	       
	}	
	// клонировать ui
  	function get_clone() 
	{
		$params = array( "inner_number" => $this->inner_number );
		$clone_inner_number = $this->call_get(__FUNCTION__,$params);	       
		return new XheUi($clone_inner_number,$this->server,$this->password);
	}	
	// сравнить ui равенство
  	function is_equal($ui) 
	{
		$params = array( "inner_number" => $this->inner_number , "inner_number_compare" => $ui->inner_number);
		return $this->call_boolean(__FUNCTION__,$params);
	}	
	// получить window interface если есть (при find_in_parents = true искать первый родительский, который поддерживает NativeWindowHandle )
  	function get_window_interface($find_in_parents = false) 
	{
		$params = array( "inner_number" => $this->inner_number , "find_in_parents" => $find_in_parents);
		$window_interface_innernumber = $this->call_get(__FUNCTION__,$params);
		return new XheWindowInterface($window_interface_innernumber,$this->server,$this->password);
	}	
	// получить window interface - синоним
  	function get_wi($find_in_parents = false) 
	{
		return get_window_interface($find_in_parents);
	}	
	// скриншот
   	function screenshot($path,$x=-1,$y=-1,$width=-1,$heigth=-1,$as_gray=false)
   	{
		$params = array( "inner_number" => $this->inner_number , "x" => $x , "y" => $y , "width" => $width , "height" => $heigth , "path" => $path, "as_gray" => $as_gray);
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	/////////////////////////////////////////////////////////////////////////////////////////////////////
	// получить информацию
  	function get_info() 
	{
		$params = array( "inner_number" => $this->inner_number );
		$res = $this->call_get(__FUNCTION__,$params);	       
		if ($res!="")
			return json_decode($res);
		else
			return null;
	}	
	// получить точку щелчка
  	function get_clickable_point() 
	{
		$params = array( "inner_number" => $this->inner_number );
		$res = $this->call_get(__FUNCTION__,$params);	       
		if ($res!="")
			return json_decode($res);
		else
			return null;
	}	
	// получить поддерживаемые шаблоны
  	function get_supported_patterns() 
	{
		$params = array( "inner_number" => $this->inner_number );
		$res = $this->call_get(__FUNCTION__,$params);	       
		if ($res!="")
			return json_decode($res);
		else
			return null;
	}	
	// получить поддерживаемые свойства
  	function get_supported_properties() 
	{
		$params = array( "inner_number" => $this->inner_number );
		$res = $this->call_get(__FUNCTION__,$params);	       
		if ($res!="")
			return json_decode($res);
		else
			return null;
	}	
	// получить свойство
  	function get_property($property) 
	{
		$params = array( "inner_number" => $this->inner_number , "property" => $property );
		return $this->call_get(__FUNCTION__,$params);	       
	}	
	// проверить существование
  	function is_exist() 
	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_boolean(__FUNCTION__,$params);	       
	}	
	// получить прямоугольник, занимаемый элементом на десктопе
  	function get_rect() 
	{
		$params = array( "inner_number" => $this->inner_number );
		$res = $this->call_get(__FUNCTION__,$params);	       
		if ($res!="")
			return json_decode($res);
		else
			return null;
	}	
	/////////////////////////////////////////////////////////////////////////////////////////////////////
	// вызвать
  	function invoke() 
	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_boolean(__FUNCTION__,$params);	       
	}	
	// фокус
  	function focus() 
	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_boolean(__FUNCTION__,$params);	       
	}	
	// переключить
  	function toggle() 
	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_boolean(__FUNCTION__,$params);	       
	}	
	// получить состояние переключателя
  	function get_toggle_state() 
	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_get(__FUNCTION__,$params);	       
	}	
	// свернуть / развернуть
  	function expand($is_expanded=true) 
	{
		$params = array( "inner_number" => $this->inner_number , "is_expanded" => $is_expanded );
		return $this->call_boolean(__FUNCTION__,$params);	       
	}	
	// получить состоние свернутости
  	function get_expanded_state() 
	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_get(__FUNCTION__,$params);	       
	}	
	// выбрать
  	function select($add_to_selected=false, $remove_from_selected=false) 
	{
		$params = array( "inner_number" => $this->inner_number , "add_to_selected" => $add_to_selected , "remove_from_selected" => $remove_from_selected );
		return $this->call_boolean(__FUNCTION__,$params);	       
	}	
	// выбран ли элемент
  	function is_selected() 
	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_boolean(__FUNCTION__,$params);	       
	}	
	// получить контейнер элементов с возможностью выбора
  	function get_selection_container() 
	{
		$params = array( "inner_number" => $this->inner_number );
		$ui_inner_number = $this->call_get(__FUNCTION__,$params);	       
		return new XheUi($ui_inner_number,$this->server,$this->password);
	}	

	// задать значение
  	function set_value($value) 
	{
		$params = array( "inner_number" => $this->inner_number , "value" => $value );
		return $this->call_boolean(__FUNCTION__,$params);	       
	}	
	// получить значение
  	function get_value() 
	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_get(__FUNCTION__,$params);	       
	}	
	// проверить что только для чтения
  	function is_read_only() 
	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_boolean(__FUNCTION__,$params);	       
	}	

	// ввод текста
  	function input($text,$with_clear=true) 
	{
		$params = array( "inner_number" => $this->inner_number , "text" => $text , "with_clear" => $with_clear);
		return $this->call_boolean(__FUNCTION__,$params);	       
	}	
	// получить текст
  	function get_text() 
	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_get(__FUNCTION__,$params);	       
	}	
	// посылает нажатие клавиши 
   	function send_key_down($key,$is_key=false,$ctrl=false,$alt=false,$shift=false)
   	{
		$params = array( "inner_number" => $this->inner_number , "key" => $key , "is_key" => $is_key, "ctrl" => $ctrl, "alt" => $alt, "shift" => $shift);
		return $this->call_boolean(__FUNCTION__,$params);
   	}
	// посылает отжатие клавиши
   	function send_key_up($key,$is_key=false,$ctrl=false,$alt=false,$shift=false)
   	{
		$params = array( "inner_number" => $this->inner_number , "key" => $key , "is_key" => $is_key, "ctrl" => $ctrl, "alt" => $alt, "shift" => $shift);
		return $this->call_boolean(__FUNCTION__,$params);
   	}

	// получить число строк в таблице
  	function get_grid_rows() 
	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_get(__FUNCTION__,$params);	       
	}	
	// получить число столбцов в таблице
  	function get_grid_cols() 
	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_get(__FUNCTION__,$params);	       
	}	
	// получить интерфейс элемента таблицы
  	function get_grid_item($row,$col) 
	{
		$params = array( "inner_number" => $this->inner_number , "row" => $row , "col" => $col );
		$ui_inner_number = $this->call_get(__FUNCTION__,$params);	 
		return new XheUi($ui_inner_number,$this->server,$this->password);      
	}	

	// получить информацию по заданному элементу таблицы
  	function get_grid_item_info() 
	{
		$params = array( "inner_number" => $this->inner_number );
		$res = $this->call_get(__FUNCTION__,$params);	       
		if ($res!="")
			return json_decode($res);
		else
			return null;
	}	
	// получить таблицу в которой находится этот элемент
  	function get_grid() 
	{
		$params = array( "inner_number" => $this->inner_number );
		$ui_inner_number = $this->call_get(__FUNCTION__,$params);	 
		return new XheUi($ui_inner_number,$this->server,$this->password);      
	}	

	// поддерживает ли элемент мультивыбор
  	function is_multiselected() 
	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_boolean(__FUNCTION__,$params);	       
	}		
	// получить выбранные
  	function get_selected() 
	{
		$params = array( "inner_number" => $this->inner_number );
		$ui_inner_numbers = $this->call_get(__FUNCTION__,$params);	 
		return new XheUiS($ui_inner_numbers,$this->server,$this->password);      
	}		

	// задать позицию вертикального скрола (в процентах)
  	function scroll_vertical($scroll_percent) 
	{
		$params = array( "inner_number" => $this->inner_number , "scroll_percent" => $scroll_percent );
		return $this->call_boolean(__FUNCTION__,$params);	       
	}	
	// задать позицию горизонтального скрола (в процентах)
  	function scroll_horizontal($scroll_percent) 
	{
		$params = array( "inner_number" => $this->inner_number , "scroll_percent" => $scroll_percent );
		return $this->call_boolean(__FUNCTION__,$params);	       
	}	
	// получить информацию о скроле
  	function get_scroll_info() 
	{
		$params = array( "inner_number" => $this->inner_number );
		$res = $this->call_get(__FUNCTION__,$params);	       
		if ($res!="")
			return json_decode($res);
		else
			return null;
	}	
	// показать элемент в области видимости скрола
  	function scroll_into_view() 
	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_boolean(__FUNCTION__,$params);	       
	}	

	// пристыковать элемент
  	function dock($pos = "left") 
	{
		$params = array( "inner_number" => $this->inner_number , "pos"  => $pos );
		return $this->call_boolean(__FUNCTION__,$params);	       
	}	
	// получить стыковочную позицию
  	function get_dock_pos() 
	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_get(__FUNCTION__,$params);	       
	}	

	// получить информацию о возможностях трансформации
  	function get_transform_info() 
	{
		$params = array( "inner_number" => $this->inner_number );
		$res = $this->call_get(__FUNCTION__,$params);	       
		if ($res!="")
			return json_decode($res);
		else
			return null;
	}	
	// изменить позицию элемента
  	function move($x,$y) 
	{
		$params = array( "inner_number" => $this->inner_number , "x"  => $x , "y"  => $y  );
		return $this->call_boolean(__FUNCTION__,$params);	       
	}	
	// изменить размер элемента
  	function resize($width,$height) 
	{
		$params = array( "inner_number" => $this->inner_number , "width"  => $width , "height"  => $height  );
		return $this->call_boolean(__FUNCTION__,$params);	       
	}	
	// повернуть элемент
  	function rotate($degree) 
	{
		$params = array( "inner_number" => $this->inner_number , "degree"  => $degree );
		return $this->call_boolean(__FUNCTION__,$params);	       
	}	


	// получить информацию о элементе как об окне
  	function get_window_info() 
	{
		$params = array( "inner_number" => $this->inner_number );
		$res = $this->call_get(__FUNCTION__,$params);	       
		if ($res!="")
			return json_decode($res);
		else
			return null;
	}	
	// закрыть окно
  	function close() 
	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_boolean(__FUNCTION__,$params);	       
	}	
	// задать визуальное состояние окна
  	function set_window_visual_state($state="normal") 
	{
		$params = array( "inner_number" => $this->inner_number , "state"  => $state );
		return $this->call_boolean(__FUNCTION__,$params);	       
	}	
	// дождаться возможности взаимодействия с окном
  	function wait_for_input_idle($milliseconds) 
	{
		$params = array( "inner_number" => $this->inner_number , "milliseconds"  => $milliseconds );
		return $this->call_boolean(__FUNCTION__,$params);	       
	}	
	// получить состояния взаимодействия окна
  	function get_interaction_state() 
	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_get(__FUNCTION__,$params);	       
	}	

	// получить информацию о таблице
  	function get_table_info() 
	{
		$params = array( "inner_number" => $this->inner_number );
		$res = $this->call_get(__FUNCTION__,$params);	       
		if ($res!="")
			return json_decode($res);
		else
			return null;
	}	
	// получить заголовки столбцов
  	function get_column_headers() 
	{
		$params = array( "inner_number" => $this->inner_number );
		$ui_inner_numbers = $this->call_get(__FUNCTION__,$params);	 
		return new XheUiS($ui_inner_numbers,$this->server,$this->password);      
	}		
	// получить заголовки строк
  	function get_row_headers() 
	{
		$params = array( "inner_number" => $this->inner_number );
		$ui_inner_numbers = $this->call_get(__FUNCTION__,$params);	 
		return new XheUiS($ui_inner_numbers,$this->server,$this->password);      
	}	

	// сделать доступным для завимодействия вирутальный Ui
  	function realize() 
	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_boolean(__FUNCTION__,$params);	       
	}	
	
	// получить имя вида
  	function get_view_name($view_id) 
	{
		$params = array( "inner_number" => $this->inner_number , "view_id" => $view_id );
		return $this->call_boolean(__FUNCTION__,$params);	       
	}	
	// задать активный вид
  	function set_current_view($view_id) 
	{
		$params = array( "inner_number" => $this->inner_number , "view_id" => $view_id );
		return $this->call_boolean(__FUNCTION__,$params);	       
	}	
	// получить активный вид
  	function get_current_view() 
	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_get(__FUNCTION__,$params);	       
	}	
	// получить поддерживаемые виды
  	function get_supported_views() 
	{
		$params = array( "inner_number" => $this->inner_number );
		$res = $this->call_get(__FUNCTION__,$params);	       
		if ($res!="")
			return json_decode($res);
		else
			return null;
	}	
	/////////////////////////////////////////////////////////////////////////////////////////////////////
	// получить из заданной точки
  	function get_from_point($x,$y) 
	{
		$params = array( "inner_number" => $this->inner_number , "x" => $x , "y" => $y );
		$ui_inner_number = $this->call_get(__FUNCTION__,$params);	       
		return new XheUi($ui_inner_number,$this->server,$this->password);
	}	
	// получить по значению свойства
  	function get_by_property($property_name,$property_value,$tree_scope="subtree",$ignore_case=false,$exactly=true) 
	{
		$params = array( "inner_number" => $this->inner_number , "tree_scope" => $tree_scope , "property_name" => $property_name , "property_value" => $property_value , "ignore_case" => $ignore_case , "exactly" => $exactly );
		$ui_inner_number = $this->call_get(__FUNCTION__,$params);	       
		return new XheUi($ui_inner_number,$this->server,$this->password);
	}	
	// получить по значению нескольких свойств
  	function get_by_properties($properties,$tree_scope="subtree",$ignore_case=false) 
	{
		$params = array( "inner_number" => $this->inner_number , "tree_scope" => $tree_scope , "properties" => json_encode($properties) , "ignore_case" => $ignore_case );
		$ui_inner_number = $this->call_get(__FUNCTION__,$params);	       
		return new XheUi($ui_inner_number,$this->server,$this->password);
	}	
	// получить все с заданными значениями свойства
  	function get_all_by_property($property_name,$property_value,$tree_scope="subtree",$ignore_case=false,$exactly=true) 
	{
		$params = array( "inner_number" => $this->inner_number , "tree_scope" => $tree_scope , "property_name" => $property_name , "property_value" => $property_value , "ignore_case" => $ignore_case , "exactly" => $exactly);
		$ui_inner_numbers = $this->call_get(__FUNCTION__,$params);	       
		return new XheUiS($ui_inner_numbers,$this->server,$this->password);
	}	
	// получить все с заданными значениями нескольких свойств
  	function get_all_by_properties($properties,$tree_scope="subtree",$ignore_case=false) 
	{
		$params = array( "inner_number" => $this->inner_number , "tree_scope" => $tree_scope , "properties" => json_encode($properties) , "ignore_case" => $ignore_case );
		$ui_inner_numbers = $this->call_get(__FUNCTION__,$params);	       
		return new XheUiS($ui_inner_numbers,$this->server,$this->password);
	}	
	/////////////////////////////////////////////////////////////////////////////////////////////////////
	// получить родительский элемент самого верхнего уровня
  	function get_top_parent() 
	{
		$params = array( "inner_number" => $this->inner_number );
		$ui_inner_number = $this->call_get(__FUNCTION__,$params);	       
		return new XheUi($ui_inner_number,$this->server,$this->password);
	}	
	// получить родительский элемент
  	function get_parent($level=0) 
	{
		$params = array( "inner_number" => $this->inner_number , "level" => $level );
		$ui_inner_number = $this->call_get(__FUNCTION__,$params);	       
		return new XheUi($ui_inner_number,$this->server,$this->password);
	}	
	// получить следующий элемент
  	function get_next($number=0) 
	{
		$params = array( "inner_number" => $this->inner_number , "number" => $number );
		$ui_inner_number = $this->call_get(__FUNCTION__,$params);	       
		return new XheUi($ui_inner_number,$this->server,$this->password);
	}	
	// получить предыдущий элемент
  	function get_prev($number=0) 
	{
		$params = array( "inner_number" => $this->inner_number , "number" => $number );
		$ui_inner_number = $this->call_get(__FUNCTION__,$params);	       
		return new XheUi($ui_inner_number,$this->server,$this->password);
	}	
	// получить дочерний элемент
  	function get_child($level=0) 
	{
		$params = array( "inner_number" => $this->inner_number , "level" => $level );
		$ui_inner_number = $this->call_get(__FUNCTION__,$params);	       
		return new XheUi($ui_inner_number,$this->server,$this->password);
	}	
	// получить все родительские элементы (1 го уровня вложенности)
  	function get_all_parent() 
	{
		$params = array( "inner_number" => $this->inner_number );
		$ui_inner_numbers = $this->call_get(__FUNCTION__,$params);	       
		return new XheUiS($ui_inner_numbers,$this->server,$this->password);
	}	
	// получить все дочерние элементы (1 го уровня вложенности)
  	function get_all_child() 
	{
		$params = array( "inner_number" => $this->inner_number );
		$ui_inner_numbers = $this->call_get(__FUNCTION__,$params);	       
		return new XheUiS($ui_inner_numbers,$this->server,$this->password);
	}	
	// получить все следующие элементы 
  	function get_all_next() 
	{
		$params = array( "inner_number" => $this->inner_number );
		$ui_inner_numbers = $this->call_get(__FUNCTION__,$params);	       
		return new XheUiS($ui_inner_numbers,$this->server,$this->password);
	}	
	// получить все предыдущие элементы 
  	function get_all_prev() 
	{
		$params = array( "inner_number" => $this->inner_number );
		$ui_inner_numbers = $this->call_get(__FUNCTION__,$params);	       
		return new XheUiS($ui_inner_numbers,$this->server,$this->password);
	}	
	/////////////////////////////////////////////////////////////////////////////////////////////////////
	// перемещение мышью
   	function mouse_move($dx=-1,$dy=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "dx" => $dx , "dy" => $dy );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   

	// щелчок мышью
   	function mouse_click($dx=-1,$dy=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "dx" => $dx , "dy" => $dy );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// двойной щелчок мышью
   	function mouse_double_click($dx=-1,$dy=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "dx" => $dx , "dy" => $dy );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// нажатие левой кнопки мыши
   	function mouse_left_down($dx=-1,$dy=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "dx" => $dx , "dy" => $dy );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// отжатие левой кнопки мыши
   	function mouse_left_up($dx=-1,$dy=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "dx" => $dx , "dy" => $dy );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   

	// щелчок правой кнопки мыши
   	function mouse_right_click($dx=-1,$dy=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "dx" => $dx , "dy" => $dy );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// нажатие правой кнопки мыши
   	function mouse_right_down($dx=-1,$dy=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "dx" => $dx , "dy" => $dy );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// отжатие правой кнопки мыши
   	function mouse_right_up($dx=-1,$dy=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "dx" => $dx , "dy" => $dy );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
        /////////////////////////////////////////////////////////////////////////////////////////////////////
	// перемещение мышью
   	function send_mouse_move($dx=-1,$dy=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "dx" => $dx , "dy" => $dy );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   

	// щелчок мышь
   	function send_mouse_click($dx=-1,$dy=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "dx" => $dx , "dy" => $dy );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// двойной щелчок мышью
   	function send_mouse_double_click($dx=-1,$dy=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "dx" => $dx , "dy" => $dy );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// нажатие левой кнопки мыши
   	function send_mouse_left_down($dx=-1,$dy=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "dx" => $dx , "dy" => $dy );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// отжатие левой кнопки мыши
   	function send_mouse_left_up($dx=-1,$dy=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "dx" => $dx , "dy" => $dy );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   

	// щелчок правой кнопки мыши
   	function send_mouse_right_click($dx=-1,$dy=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "dx" => $dx , "dy" => $dy );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// нажатие правой кнопки мыши
   	function send_mouse_right_down($dx=-1,$dy=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "dx" => $dx , "dy" => $dy );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// отжатие правой кнопки мыши
   	function send_mouse_right_up($dx=-1,$dy=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "dx" => $dx , "dy" => $dy );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
        /////////////////////////////////////////////////////////////////////////////////////////////////////
	// ожидать появление интерфейса с заданным свойством
  	function wait_for_ui_open_by_property($property_name,$property_value,$tree_scope="subtree",$ignore_case=false,$wait_time_in_seconds=120) 
	{
		$params = array( "inner_number" => $this->inner_number , "tree_scope" => $tree_scope , "property_name" => $property_name , "property_value" => $property_value , "ignore_case" => $ignore_case , "wait_time_in_seconds" => $wait_time_in_seconds );
		return $this->call_boolean(__FUNCTION__,$params);	       
	}	
	// ожидать закрытия интерфейса с заданным свойством
  	function wait_for_ui_close_by_property($property_name,$property_value,$tree_scope="subtree",$ignore_case=false,$wait_time_in_seconds=120) 
	{
		$params = array( "inner_number" => $this->inner_number , "tree_scope" => $tree_scope , "property_name" => $property_name , "property_value" => $property_value , "ignore_case" => $ignore_case , "wait_time_in_seconds" => $wait_time_in_seconds );
		return $this->call_boolean(__FUNCTION__,$params);	       
	}	
	// ожидать появление интерфейса с заданными свойствами
  	function wait_for_ui_open_by_properties($properties,$tree_scope="subtree",$ignore_case=false,$wait_time_in_seconds=120) 
	{
		$params = array( "inner_number" => $this->inner_number , "tree_scope" => $tree_scope , "properties" => json_encode($properties) , "ignore_case" => $ignore_case , "wait_time_in_seconds" => $wait_time_in_seconds );
		return $this->call_boolean(__FUNCTION__,$params);	       
	}	
	// ожидать закрытия интерфейса с заданными свойствами
  	function wait_for_ui_close_by_properties($properties,$tree_scope="subtree",$ignore_case=false,$wait_time_in_seconds=120) 
	{
		$params = array( "inner_number" => $this->inner_number , "tree_scope" => $tree_scope , "properties" => json_encode($properties) , "ignore_case" => $ignore_case , "wait_time_in_seconds" => $wait_time_in_seconds );
		return $this->call_boolean(__FUNCTION__,$params);	       
	}	
        /////////////////////////////////////////////////////////////////////////////////////////////////////
};		
?>