<?php
namespace Xhe;
use Xhe\XheWord;

class XheWordfileCompatible extends XheBaseObject
{
	/////////////////////////////////////////////////////////////////////////////////////////////////////
	
	// конвертировать файл в другой формат xlsx,xls,csv,txt,html,pdf,xps (требует чтобы был установлен Excel не ниже 15 версии на компьютере)
   	function convert($inpath,$outpath,$timeout=600) 
   	{
		$word = new Xhe\XheWord($this->server);
		echo "\n<font color=blue>wordfile->convert is deprecated : use word->convert</font>\n";
		return $word->convert($inpath,$outpath,$timeout);
   	}    	
	// получить число страниц в файле
   	function get_page_count($path) 
   	{
		$word = new Xhe\XheWord($this->server);
		echo "\n<font color=blue>wordfile->get_page_count is deprecated : use word->get_page_count</font>\n";
		return $word->get_page_count($path);
   	}    	
	// экспортировать страницы
   	function export_pages($inpath, $outpath, $from_page , $count = 1) 
   	{
		$word = new Xhe\XheWord($this->server);
		echo "\n<font color=blue>wordfile->export_pages is deprecated : use word->export_pages</font>\n";
		return $word->export_pages($inpath, $outpath, $from_page , $count );
   	}    	
	// экспортировать все страницы
   	function export_all_pages($inpath, $to_folder, $ext = "pdf") 
   	{
		$word = new Xhe\XheWord($this->server);
		echo "\n<font color=blue>wordfile->export_all_pages is deprecated : use word->export_all_pages</font>\n";
		return $word->export_all_pages($inpath, $to_folder, $ext);
   	}    	
   	// прочитать таблицу по номеру в Word файле
   	function read_table_by_number($path,$number,$as_array=false) 
   	{
		echo "\n<font color=blue>wordfile->read_table_by_number is deprecated : use wordfile->get_table_by_number</font>\n";
		return $this->get_table_by_number($path,$number,$as_array);
   	}
        // сравнить 2 документа
   	function compare($inpath1,$inpath2) 
   	{
		$word = new Xhe\XheWord($this->server);
		echo "\n<font color=blue>wordfile->compare is deprecated : use word->compare</font>\n";
		return $word->compare($inpath1, $inpath2);
   	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////
};		
?>