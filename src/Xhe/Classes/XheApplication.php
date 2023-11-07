<?php
namespace Xhe;
class XheApplication extends XheApplicationCompatible
{
	//////////////////////////////////// SERVICE VARIABLES ///////////////////////////////////////////
	// enable exit
	var $enable_exit=true;
	var $finished=false;
	//////////////////////////////////////////////////////////////////////////////////////////////////

	//////////////////////////////////// СЕРВИСНЫЕ ФУНКЦИИ //////////////////////////////////////////
	// server initialization
	function __construct($server,$password="")
	{    
		$this->server = $server;
		$this->password = $password;
		$this->enable_exit=true;
		$this->prefix = "Application";
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////

   	// получить ответ на вопрос через диалог
   	function dlg_question($message)
   	{
		$params = array( "message" => $message );
	     	$ret=$this->call_get(__FUNCTION__,$params,99999);

		global $PHP_Use_Trought_Shell;
		if ($PHP_Use_Trought_Shell)
			fgets(STDIN);

         	return $ret;
   	}
   	// получить строку из диалога
   	function get_dlg_input_string($dlg_name,$dlg_text,$default_answer="")
   	{
		$params = array( "dlg_name" => $dlg_name , "dlg_text" => $dlg_text , "default_answer" => $default_answer );
	     	$ret=$this->call_get(__FUNCTION__,$params,99999);

		global $PHP_Use_Trought_Shell;
		if ($PHP_Use_Trought_Shell)
			fgets(STDIN);

         	return $ret;
   	}
   	// получить путь к файлу через диалог
   	function get_dlg_select_file($path,$action)
   	{
		$params = array( "path" => $path , "action" => $action );
	     	$ret=$this->call_get(__FUNCTION__,$params,99999);

		global $PHP_Use_Trought_Shell;
		if ($PHP_Use_Trought_Shell)
			fgets(STDIN);

         	return $ret;
   	}
   	// получить путь к папке через диалог
   	function get_dlg_select_folder($path,$caption,$action)
   	{
		$params = array( "path" => $path , "caption" => $caption , "action" => $action   );
	     	$ret=$this->call_get(__FUNCTION__,$params,99999);

		global $PHP_Use_Trought_Shell;
		if ($PHP_Use_Trought_Shell)
			fgets(STDIN);

         	return $ret;
   	}
   	// выбрать одну или несколько картинок из папки
   	function dlg_select_image($folder,$text,$caption,$multi_select=false)
   	{
		$params = array( "folder" => $folder , "text" => $text , "caption" => $caption , "multi_select" => $multi_select );
	     	$ret=$this->call_get(__FUNCTION__,$params,999999);

		global $PHP_Use_Trought_Shell;
		if ($PHP_Use_Trought_Shell)
			fgets(STDIN);

         	return $ret;
   	}
   	// подтвердить OCR распознание
   	function dlg_verify_ocr($image_path,$text_for_verify,$text,$caption)
   	{
		$params = array( "text" => $text , "caption" => $caption , "image_path" => $image_path , "text_for_verify" => $text_for_verify );
	     	$ret=$this->call_get(__FUNCTION__,$params,999999);

		global $PHP_Use_Trought_Shell;
		if ($PHP_Use_Trought_Shell)
			fgets(STDIN);

         	return $ret;
   	}
   	// вызвать произвольный диалог на основе xml
	function show_free_dlg($xml,$is_ret_xml="true",$separator="\r\n")
	{
		$params = array( "xml" => $xml , "is_ret_xml" => $is_ret_xml , "separator" => $separator );
	     	$ret=$this->call_get(__FUNCTION__,$params,99999);

		global $PHP_Use_Trought_Shell;
		if ($PHP_Use_Trought_Shell)
			fgets(STDIN);

		return $ret;
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////

   	// вывести капчу в диалог из заданного номера картинки и получить ее значение
   	function dlg_captcha_from_image_number($number,$frame=-1)
   	{
		$params = array( "number" => $number , "frame" => $frame );
		$res = $this->call_get(__FUNCTION__,$params,99999);

		global $PHP_Use_Trought_Shell;
		if ($PHP_Use_Trought_Shell)
			fgets(STDIN);

        	return $res;
   	}
   	// вывести капчу в диалог из заданного урла картинки и получить ее значение
   	function dlg_captcha_from_url($url)
   	{
		$params = array( "url" => $url );
		$res = $this->call_get(__FUNCTION__,$params,99999);

		global $PHP_Use_Trought_Shell;
		if ($PHP_Use_Trought_Shell)
			fgets(STDIN);

        	return $res;
   	}
   	// вывести капчу в диалог из заданного урла или его части картинки и получить ее значение
   	function dlg_captcha_from_url_exactly($url,$exactly=true,$frame=-1)
   	{
		$params = array( "url" => $url , "exactly" => $exactly , "frame" => $frame );
		$res = $this->call_get(__FUNCTION__,$params,99999);

		global $PHP_Use_Trought_Shell;
		if ($PHP_Use_Trought_Shell)
			fgets(STDIN);

        	return $res;
   	}

	//////////////////////////////////////////////////////////////////////////////////////////////////

	// задать расположение программы на рабочем столе
	function set_window_position($x,$y,$width,$height)
	{
		$params = array( "x" => $x , "y" => $y , "width" => $width , "height" => $height );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// задать заголовок программы
	function set_title($title)
	{
		$params = array( "title" => $title );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// инициировать мигание иконки программы в панели задач
	function set_blink($blink)
	{
		$params = array( "blink" => $blink );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// показать или спрятать левую панель
	function show_left_pane($show)
	{
		$params = array( "show" => $show );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// показать или спрятать нижнюю панель
	function show_bottom_pane($show)
	{
		$params = array( "show" => $show );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// перейти в полноэкранный режим
	function enable_full_screen($enable)
	{
		$params = array( "enable" => $enable );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// минимизировать программу в трей
	function minimize_to_tray()
	{
		$params = array( );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// минимизировать программу в трей при старте
	function minimize_to_tray_by_start($minimize=true)
	{
		$params = array( "minimize" => $minimize );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// максимизировать размер программы
	function maximize($hiding_mode=false)
	{
		$params = array( "hiding_mode" => $hiding_mode );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// показать программу из трея
	function show_from_tray()
	{
		$params = array( );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// показать иконку в трее
	function show_tray_icon($show)
	{
		$params = array( "show" => $show );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// задать иконку в трее
	function set_tray_icon($path)
	{
		$params = array( "path" => $path );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// задать всплывающую подсказку в трее
	function set_tray_tooltip($tooltip)
	{
		$params = array( "tooltip" => $tooltip );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// вытащить окно программы наверх
	function set_foreground_window()
	{       
		$params = array( );
		$res=$this->call_get(__FUNCTION__,$params);
		if ($res=="true")
			return true;
		else
			return $res;
	}
	// сделать чтобы окно программы показывалось поверх всех окон
	function set_always_on_top($ontop)
	{
		$params = array( "ontop" => $ontop );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// получить тип курсора
	function get_cursor_type($x=-1,$y=-1,$as_text=false)
	{
		$params = array( "x" => $x , "y" => $y , "as_text" => $as_text );
		return $this->call_get(__FUNCTION__,$params);
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////

	// приостановить выполнени скрипта на заданное время (в минутах, если 0 - то бесконечно)
   	function pause($timeout=0)
   	{
		$res=false;
		if ($timeout==0)
		{
			$params = array( "timeout" => $timeout);
			$res = $this->call_boolean(__FUNCTION__,$params);

			global $PHP_Use_Trought_Shell;
			while(true)
			{
				sleep(1);
				if (!$this->is_script_paused())
					break;
			}
		}
		else
		{
			$res=true;
			usleep($timeout*1000);
		}

		return $res;
   	}
	// выйти из программы
   	function exitapp()
   	{
		$params = array( );
		return $this->call_boolean(__FUNCTION__,$params);
   	}
	// остановить скрипт
   	function stop_script()
   	{
		$params = array( );
		return $this->call_boolean(__FUNCTION__,$params);
   	}
	// перезапустить программу
   	function restart($scriptpath="",$params="",$port="",$cache_folder="",$cookies_folder="",$pause_before_start_s=0)
   	{
		$params = array( "scriptpath" => $scriptpath , "params" => $params , "port" => $port , "cache_folder" => $cache_folder , "cookies_folder" => $cookies_folder , "pause_before_start_s" => $pause_before_start_s );
		$res=$this->call_boolean(__FUNCTION__,$params);

                if ($scriptpath!="")
                  die("");
	
		return $res;
   	}
	// очистить папки портов и темп с логами
	function clear()
	{
		$params = array( );
		$res = $this->call_get(__FUNCTION__,$params,6000);
		sleep(2);
		//global $browser;
		//$browser->clear_cookies("",true,true);
		return $res;
	}
	// остановить выполнение скрипта
	function quit($message="")
	{
		sleep(1);
		if ($this->enable_exit)
		{
		  $params = array( );
		  $res=$this->call_boolean(__FUNCTION__,$params);

		  if ($message=="")
		  	echo $message;
		  $this->finished=true;
		  usleep(1000000);
		  die("app@exit");
		  return $res;
		}

		return false;
	}
	// зпдпть возможность остановки выполнения скрипта командой quit
	function enable_quit($enable_exit)
	{
		$this->enable_exit=$enable_exit;
		return true;
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////

	// получить порт на котором запущена программа
	function get_port()
	{       
		$params = array( );
		return $this->call_get(__FUNCTION__,$params);
	}
	// получить ID инсталяции
	function get_install_id()
	{       
		$params = array( );
		return $this->call_get(__FUNCTION__,$params);
	}
	// получить версию программы
	function get_version($extended=false)
	{       
		$params = array( "extended" => $extended );
		return $this->call_get(__FUNCTION__,$params);
	}

   	// получить путь к программе
   	function get_program_path()
   	{
		$params = array( );
		return $this->call_get(__FUNCTION__,$params);
   	}
   	// получить папку программы
   	function get_program_folder()
   	{
		$params = array( );
		return $this->call_get(__FUNCTION__,$params);
   	}

	//////////////////////////////////////////////////////////////////////////////////////////////////

	// получить содержимое файла с компьютера на котором запущена программа
   	function get_file_from_disk($path)
   	{
		$params = array( "path" => $path );
		return $this->call_get(__FUNCTION__,$params);
   	}
	//////////////////////////////////////////////////////////////////////////////////////////////////

	// задать параметры поиска DOM объектов
   	function set_params_object_search($regsense=false)
   	{
		$params = array( "regsense" => $regsense );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// задать параметры того что будет делать программа при переполнении памяти
   	function set_params_outofmemory_action($restart_type=0)
   	{
		$params = array( "restart_type" => $restart_type );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// установить во все диалоги галочку - не спрашивать снова (выдавать OK,Yes)
   	function set_dont_ask_me_again_mode($mode=1)
   	{
		$params = array( "mode" => $mode );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
   	// задать обработку скрипта как юникод
   	function set_script_as_unicode($is_unicode = true)
   	{
		$params = array( "is_unicode" => $is_unicode );
		return $this->call_boolean(__FUNCTION__,$params);
   	}
	// блокировать мышку и клавиатуру
   	function block_input($is_block=true)
   	{
		$params = array( "is_block" => $is_block );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   


	//////////////////////////////////////////////////////////////////////////////////////////////////

	// выполнить скрипт по заданному пути
   	function run_script($path,$params="")
   	{
		$params = array(  "path" => $path , "params_" => $params );
		return $this->call_get(__FUNCTION__,$params);
   	}
	// выполнить содержимое, как bat-файл по заданному пути
   	function run_as_bat($content,$path,$show=false)
   	{
		$params = array( "content" => $content , "path" => $path , "show" => $show );
		return $this->call_boolean(__FUNCTION__,$params);
   	}   
	// выполнить содержимое, как php-файл по заданному пути
   	function run_as_php($content,$path,$show=false,$params="")
   	{
		$params = array( "content" => $content , "path" => $path , "show" => $show , "params" => $params );
		return $this->call_get(__FUNCTION__,$params);
   	}
	// выполнить содержимое, как python-файл по заданному пути
   	function run_as_python($content,$path,$show=false,$params="")
   	{
		$params = array( "content" => $content , "path" => $path , "show" => $show , "params" => $params );
		return $this->call_get(__FUNCTION__,$params);
   	}
	// выполнить содержимое, как js-файл по заданному пути
   	function run_as_js($content,$path,$show=false,$params="")
   	{
		$params = array( "content" => $content , "path" => $path , "show" => $show , "params" => $params );
		return $this->call_get(__FUNCTION__,$params);
   	}
	// выполнить консольный exe файл по заданному пути
   	function run_as_console($path,$show=false,$params="",$encoding="")
   	{
		$params = array( "path" => $path , "show" => $show , "params" => $params , "encoding" => $encoding );
		return $this->call_get(__FUNCTION__,$params);
   	}
	// выполнить внешнюю программу по заданному пути
   	function shell_execute($operat,$file,$param="",$dir="",$show=true)
   	{
		$params = array( "operat" => $operat , "file" => $file , "param" => $param , "dir" => $dir , "show" => $show  );
		return $this->call_get(__FUNCTION__,$params);
   	}
	// выполнить powershell скрипт
   	function run_powershell_script($path,$script_params="")
   	{
		if ($script_params!="")
			$script_params=json_encode($script_params);
		$params = array( "path" => $path , "script_params" => $script_params );
		return $this->call_get(__FUNCTION__,$params);
   	}

	// завершить процесс с заданным именем
	function kill_process($exe_name)
	{
		$params = array( "exe_name" => $exe_name );
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// проверить есть ли процесс с таким именем
	function is_process_exists_by_name($name,$exactly=false)
	{
		$params = array( "name" => $name, "exactly" => $exactly);
		return $this->call_boolean(__FUNCTION__,$params);
	}
	// проверить есть ли процесс с таким путем
	function is_process_exists_by_path($path,$exactly=false)
	{
		$params = array( "path" => $path, "exactly" => $exactly);
		return $this->call_boolean(__FUNCTION__,$params);
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////

        // показать прогресс бар в строке статуса
        function show_progress_bar($show)
        {
		$params = array( "show" => $show );
		return $this->call_boolean(__FUNCTION__,$params);
        }
        // задать диапазон прогресс бара
        function set_progress_range($min,$max,$step=1)
   	{
		$params = array( "min" => $min , "max" => $max , "step" => $step  );
		return $this->call_boolean(__FUNCTION__,$params);
   	}        
        // задать позицию прогресс бара
        function set_progress_pos($pos)
        {
		$params = array( "pos" => $pos );
		return $this->call_boolean(__FUNCTION__,$params);
        }
        // увеличить значение прогресс бара на 1 шаг
        function step_progress()
        {
		$params = array( );
		return $this->call_boolean(__FUNCTION__,$params);
        }
        // задать текст прогресс бара
        function set_progress_text($text)
        {
		$params = array( "text" => $text );
		return $this->call_boolean(__FUNCTION__,$params);
        }

	//////////////////////////////////////////////////////////////////////////////////////////////////

   	// выполняется ли сейчас скрипт в оболочке (сервисная)
   	function is_script_paused()
   	{
		$params = array( );
		return $this->call_get(__FUNCTION__,$params);
   	}
};
?>