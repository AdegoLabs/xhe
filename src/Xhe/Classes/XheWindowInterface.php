<?php
namespace Xhe;
class XheWindowInterface extends XheWindowInterfacesCompatible
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
		$this->prefix = "WindowInterface";
	}
  	function __destruct() 
	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_boolean(__FUNCTION__,$params);	       
	}	
	// клонировать интерфейс к окну
  	function get_clone() 
	{
		$params = array( "inner_number" => $this->inner_number );
		$clone_inner_number = $this->call_get(__FUNCTION__,$params);	       
		return new XheWindowInterface($clone_inner_number,$this->server,$this->password);
	}	
	// получить окно как UI элемент
  	function get_ui_element() 
	{
		$params = array( "inner_number" => $this->inner_number );
		$ui_inner_number = $this->call_get(__FUNCTION__,$params);	       
		return new XheUI($ui_inner_number,$this->server,$this->password);
	}	
	// получить окно как UI элемент (синоним)
  	function get_ui() 
	{
		return $this->get_ui_element();
	}	
	/////////////////////////////////////////////////////////////////////////////////////////////////////

	// задать текст окна
   	function set_text($text)
   	{
		$params = array( "inner_number" => $this->inner_number , "text" => $text );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// задать видимость окна
   	function show($on=true)
   	{
		$params = array( "inner_number" => $this->inner_number , "on" => $on );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// изменить доступность окна
   	function enable($on)
   	{
		$params = array( "inner_number" => $this->inner_number , "on" => $on );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   

	// задать фокус на окно
   	function focus()
   	{
		$params = array( "inner_number" => $this->inner_number);
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// перемстить окно в самый верх 
   	function foreground()
   	{
		$params = array( "inner_number" => $this->inner_number);
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// минимизирвоать окно
   	function minimize()
   	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// максимизировать окно
   	function maximize()
   	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// восстановить окно
   	function restore()
   	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// закрыть окно
   	function close()
   	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   

	// передвинуть окно
   	function move($x=-1,$y=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "x" => $x , "y" => $y );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// изменить размер окна
   	function resize($width=-1,$height=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "width" => $width , "height" => $height );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// послать сообщение в окно
   	function message($type,$wparam,$lparam)
   	{
		$params = array( "inner_number" => $this->inner_number , "type" => $type , "wparam" => $wparam , "lparam" => $lparam );
		return $this->call_get(__FUNCTION__,$params);
   	}   

	// выполнить операцию вырезать в окне
   	function cut()
   	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// выполнить операцию копирования в окне
   	function copy()
   	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// выполнить операцию вставить в окне
   	function paste($text="")
   	{
		$params = array( "inner_number" => $this->inner_number , "text" => $text);
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// выполнить операцию очистить в окне
   	function clear()
   	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// выполнить операцию отменить в окне
   	function undo()
   	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   

	// скриншот окна
   	function screenshot($filepath,$x=-1,$y=-1,$width=-1,$heigth=-1,$as_gray=false,$with_non_client=false)
   	{
		$params = array( "inner_number" => $this->inner_number , "x" => $x , "y" => $y , "width" => $width , "height" => $heigth , "filepath" => $filepath, "as_gray" => $as_gray, "with_non_client" => $with_non_client);
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// вызвать пункт меню окна по его пути например - "0:0:5")
   	function click_menu_item($path)
   	{
		$params = array( "inner_number" => $this->inner_number , "path" => $path );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   

	// получить число дочерних окон
   	function get_child_count($include_subchildren=false)
   	{
		$params = array( "inner_number" => $this->inner_number , "include_subchildren" => $include_subchildren );
		return $this->call_get(__FUNCTION__,$params);
   	}   
	// получить дочернее окно по номеру
   	function get_child_by_number($number, $include_subchildren=false)
   	{
		$params = array( "inner_number" => $this->inner_number , "number" => $number , "include_subchildren" => $include_subchildren);
		$new_internal_number=$this->call_get(__FUNCTION__,$params);
	
		return new XheWindowInterface($new_internal_number,$this->server,$this->password);
   	}   
	// получить дочернее окно по тексту
   	function get_child_by_text($text,$exactly=false,$include_subchildren=false)
   	{
		$params = array( "inner_number" => $this->inner_number , "text" => $text , "exactly" => $exactly , "include_subchildren" => $include_subchildren);
		$new_internal_number=$this->call_get(__FUNCTION__,$params);
	
		return new XheWindowInterface($new_internal_number,$this->server,$this->password);
   	}   
	// получить дочернее окно по имени классу
   	function get_child_by_class($class_name,$exactly=false,$include_subchildren=false)
   	{
		$params = array( "inner_number" => $this->inner_number , "class_name" => $class_name , "exactly" => $exactly , "include_subchildren" => $include_subchildren );
		$new_internal_number=$this->call_get(__FUNCTION__,$params);
	
		return new XheWindowInterface($new_internal_number,$this->server,$this->password);
   	}   
	// получить дочерние окно по тексту
   	function get_all_child_by_text($text,$exactly=false,$include_subchildren=false)
   	{
		$params = array( "inner_number" => $this->inner_number , "text" => $text , "exactly" => $exactly , "include_subchildren" => $include_subchildren);
		$numbers=$this->call_get(__FUNCTION__,$params);
	
		return new XheWindowInterfaces($numbers,$this->server,$this->password);
   	}   
	// получить дочерние окно по имени классу
   	function get_all_child_by_class($class_name,$exactly=false,$include_subchildren=false)
   	{
		$params = array( "inner_number" => $this->inner_number , "class_name" => $class_name , "exactly" => $exactly , "include_subchildren" => $include_subchildren );
		$numbers=$this->call_get(__FUNCTION__,$params);
	
		return new XheWindowInterfaces($numbers,$this->server,$this->password);
   	}   
	// получить слудующее окно 
   	function get_next($number=0)
   	{
		$params = array( "inner_number" => $this->inner_number , "number" => $number);
		$new_internal_number=$this->call_get(__FUNCTION__,$params);
	
		return new XheWindowInterface($new_internal_number,$this->server,$this->password);
   	}   
	// получить предыдущее окно 
   	function get_prev($number=0)
   	{
		$params = array( "inner_number" => $this->inner_number , "number" => $number);
		$new_internal_number=$this->call_get(__FUNCTION__,$params);
	
		return new XheWindowInterface($new_internal_number,$this->server,$this->password);
   	}   
	// получить родительское окно 
   	function get_parent($level=0)
   	{
		$params = array( "inner_number" => $this->inner_number , "level" => $level );
		$new_internal_number=$this->call_get(__FUNCTION__,$params);
	
		return new XheWindowInterface($new_internal_number,$this->server,$this->password);
   	}   
	// получить владельца окна
   	function get_owner($level=0)
   	{
		$params = array( "inner_number" => $this->inner_number , "level" => $level );
		$new_internal_number=$this->call_get(__FUNCTION__,$params);
	
		return new XheWindowInterface($new_internal_number,$this->server,$this->password);
   	}   
	// получить список всех дочерних окон
   	function get_all_child($include_subchildren=false)
   	{
		$params = array( "inner_number" => $this->inner_number , "include_subchildren" => $include_subchildren );
		$numbers=$this->call_get(__FUNCTION__,$params);
	
		return new XheWindowInterfaces($numbers,$this->server,$this->password);
   	}   
	// получить список всех следующих окон
   	function get_all_next()
   	{
		$params = array( "inner_number" => $this->inner_number );
		$numbers=$this->call_get(__FUNCTION__,$params);
	
		return new XheWindowInterfaces($numbers,$this->server,$this->password);
   	}   
	// получить список всех предыдущих окон
   	function get_all_prev()
   	{
		$params = array( "inner_number" => $this->inner_number );
		$numbers=$this->call_get(__FUNCTION__,$params);
	
		return new XheWindowInterfaces($numbers,$this->server,$this->password);
   	}   
	// получить список всех родительских окон
   	function get_all_parent()
   	{
		$params = array( "inner_number" => $this->inner_number );
		$numbers=$this->call_get(__FUNCTION__,$params);
	
		return new XheWindowInterfaces($numbers,$this->server,$this->password);
   	}   
	// получить окно - наивысшего родителя
   	function get_top_parent()
   	{
		$params = array( "inner_number" => $this->inner_number );
		$new_internal_number=$this->call_get(__FUNCTION__,$params);
	
		return new XheWindowInterface($new_internal_number,$this->server,$this->password);
   	}   
	// получить окно - наивысшего владельца
   	function get_top_owner()
   	{
		$params = array( "inner_number" => $this->inner_number );
		$new_internal_number=$this->call_get(__FUNCTION__,$params);
	
		return new XheWindowInterface($new_internal_number,$this->server,$this->password);
   	}   

	// ожидать доступности окна
   	function wait_for_input_idle($wait_time_in_seconds = 120)
   	{
		$params = array( "inner_number" => $this->inner_number , "wait_time_in_seconds" => $wait_time_in_seconds);
		return $this->call_boolean(__FUNCTION__,$params);
   	}   

	// ожидать открытия дочернего окна по номеру
   	function wait_for_open_child_by_number($number, $include_subchildren=false, $wait_time_in_seconds = 120)
   	{
		$params = array( "inner_number" => $this->inner_number , "number" => $number , "include_subchildren" => $include_subchildren, "wait_time_in_seconds" => $wait_time_in_seconds);
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// ожидать открытия дочернего окна по тексту
   	function wait_for_open_child_by_text($text,$exactly=false,$include_subchildren=false, $wait_time_in_seconds = 120)
   	{
		$params = array( "inner_number" => $this->inner_number , "text" => $text , "exactly" => $exactly , "include_subchildren" => $include_subchildren, "wait_time_in_seconds" => $wait_time_in_seconds);
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// ожидать открытия дочернего окна по имени классу
   	function wait_for_open_child_by_class($class_name,$exactly=false,$include_subchildren=false, $wait_time_in_seconds = 120)
   	{
		$params = array( "inner_number" => $this->inner_number , "class_name" => $class_name , "exactly" => $exactly , "include_subchildren" => $include_subchildren , "wait_time_in_seconds" => $wait_time_in_seconds);
		return $this->call_boolean(__FUNCTION__,$params);
   	}   

	// получить текст окна
   	function get_text()
   	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_get(__FUNCTION__,$params);
   	}   
	// получить номер окна
   	function get_number($visibled=true,$mained=true)
   	{
		$params = array( "inner_number" => $this->inner_number , "visibled" => $visibled , "mained" => $mained );
		return $this->call_get(__FUNCTION__,$params);
   	}   
	// получить стиль окна (простой или расширенный)
   	function get_style($extended=false)
   	{
		$params = array( "inner_number" => $this->inner_number , "extended" => $extended );
		return $this->call_get(__FUNCTION__,$params);
   	}   
	// получить имя класса окна
   	function get_class_name()
   	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_get(__FUNCTION__,$params);
   	}   
	// получить дескриптор HWND окна
   	function get_hwnd()
   	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_get(__FUNCTION__,$params);
   	}   
	// получить ID процесса окна
   	function get_process_id()
   	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_get(__FUNCTION__,$params);
   	}   
	// получить ID потока окна
   	function get_thread_id()
   	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_get(__FUNCTION__,$params);
   	}   

	// получить X координату окна
   	function get_x($client = false)
   	{
		$params = array( "inner_number" => $this->inner_number , "client" => $client );
		return $this->call_get(__FUNCTION__,$params);
   	}   
	// получить Y координату окна
   	function get_y($client = false)
   	{
		$params = array( "inner_number" => $this->inner_number , "client" => $client );
		return $this->call_get(__FUNCTION__,$params);
   	}   
	// получить ширину окна
   	function get_width($client = false)
   	{
		$params = array( "inner_number" => $this->inner_number , "client" => $client );
		return $this->call_get(__FUNCTION__,$params);
   	}   
	// получить высоту окна
   	function get_height($client = false)
   	{
		$params = array( "inner_number" => $this->inner_number , "client" => $client );
		return $this->call_get(__FUNCTION__,$params);
   	}   

	// существует ли окно
   	function is_exist()
   	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// видимо ли окно
   	function is_visible()
   	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// доступно ли окно
   	function is_enable()
   	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// есть ли фокус ввода на окне
   	function is_focus()
   	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// есть ли пользовательский фокус ввода на окне
   	function is_foreground()
   	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// дочернее ли окно
   	function is_child()
   	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// минимизировано ли окно
   	function is_minimize()
   	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// максимизировано ли окно
   	function is_maximize()
   	{
		$params = array( "inner_number" => $this->inner_number );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   

	// послать перемещение мышью в окно
   	function send_mouse_move($dx=-1,$dy=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "dx" => $dx , "dy" => $dy );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   

	// послать щелчок мышью в окно
   	function send_mouse_click($dx=-1,$dy=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "dx" => $dx , "dy" => $dy );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// послать двойной щелчок мышью в окно
   	function send_mouse_double_click($dx=-1,$dy=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "dx" => $dx , "dy" => $dy );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// послать нажатие левой кнопки мыши в окно
   	function send_mouse_left_down($dx=-1,$dy=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "dx" => $dx , "dy" => $dy );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// послать отжатие левой кнопки мыши в окно
   	function send_mouse_left_up($dx=-1,$dy=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "dx" => $dx , "dy" => $dy );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   

	// послать щелчок правой кнопки мыши в окно
   	function send_mouse_right_click($dx=-1,$dy=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "dx" => $dx , "dy" => $dy );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// послать нажатие правой кнопки мыши в окно
   	function send_mouse_right_down($dx=-1,$dy=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "dx" => $dx , "dy" => $dy );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// послать отжатие правой кнопки мыши в окно
   	function send_mouse_right_up($dx=-1,$dy=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "dx" => $dx , "dy" => $dy );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   

	// перемещение мышью в окне
   	function mouse_move($dx=-1,$dy=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "dx" => $dx , "dy" => $dy );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   

	// щелчок мышью в окне
   	function mouse_click($dx=-1,$dy=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "dx" => $dx , "dy" => $dy );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// двойной щелчок мышью в окне
   	function mouse_double_click($dx=-1,$dy=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "dx" => $dx , "dy" => $dy );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// нажатие левой кнопки мыши в окне
   	function mouse_left_down($dx=-1,$dy=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "dx" => $dx , "dy" => $dy );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// отжатие левой кнопки мыши в окне
   	function mouse_left_up($dx=-1,$dy=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "dx" => $dx , "dy" => $dy );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   

	// щелчок правой кнопки мыши в окне
   	function mouse_right_click($dx=-1,$dy=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "dx" => $dx , "dy" => $dy );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// нажатие правой кнопки мыши в окне
   	function mouse_right_down($dx=-1,$dy=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "dx" => $dx , "dy" => $dy );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// отжатие правой кнопки мыши в окне
   	function mouse_right_up($dx=-1,$dy=-1)
   	{
		$params = array( "inner_number" => $this->inner_number , "dx" => $dx , "dy" => $dy );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   

	// посылает нажатие клавиши в окно
   	function send_key_down($key,$is_key=false,$ctrl=false,$alt=false,$shift=false)
   	{
		$params = array( "inner_number" => $this->inner_number , "key" => $key , "is_key" => $is_key, "ctrl" => $ctrl, "alt" => $alt, "shift" => $shift);
		return $this->call_boolean(__FUNCTION__,$params);
   	}
	// посылает отжатие клавиши в окно
   	function send_key_up($key,$is_key=false,$ctrl=false,$alt=false,$shift=false)
   	{
		$params = array( "inner_number" => $this->inner_number , "key" => $key , "is_key" => $is_key, "ctrl" => $ctrl, "alt" => $alt, "shift" => $shift);
		return $this->call_boolean(__FUNCTION__,$params);
   	}

	// эммулирует ввод всех символов из переданной функции строки в окно
   	function input($string,$timeout=INPUT_TIME)
   	{
		global $PHP_Use_Trought_Shell;

		$params = array( "inner_number" => $this->inner_number , "string" => $string , "timeout" => $timeout );
		$res=$this->call_boolean(__FUNCTION__,$params);

		if ($PHP_Use_Trought_Shell)
			fgets(STDIN);

		sleep(1);
		return $res;
   	}
	// эммулирует ввод одной кнопки по ее скан коду в окне
   	function key($code,$is_key=false,$ctrl=false,$alt=false,$shift=false)
   	{
		$params = array( "inner_number" => $this->inner_number , "code" => $code , "ctrl" => $ctrl, "alt" => $alt, "shift" => $shift );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// эмулирует нажатие клавиши в окне
   	function key_down($key)
   	{
		$params = array( "inner_number" => $this->inner_number , "key" => $key  );
		return $this->call_boolean(__FUNCTION__,$params);
   	}
	// эмулирует отжатие клавиши  в окне
   	function key_up($key)
   	{
		$params = array( "inner_number" => $this->inner_number , "key" => $key  );
		return $this->call_boolean(__FUNCTION__,$params);
   	}
	// эммулирует задание языка ввода  в окне
   	function set_current_language($language)
   	{
		$params = array( "inner_number" => $this->inner_number , "language" => $language  );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
};		
?>