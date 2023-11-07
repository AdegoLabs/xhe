<?php
namespace Xhe;
use Xhe\XheExcel;
class XheExcelFileCompatible extends XheBaseObject
{
	/////////////////////////////////////////////////////////////////////////////////////////////////////
	
	// конвертировать файл в другой формат xlsx,xls,csv,txt,html,pdf,xps (требует чтобы был установлен Excel не ниже 15 версии на компьютере)
   	function convert($inpath,$outpath,$timeout=600) 
   	{
		$excel = new Xhe\XheExcel($this->server);
		echo "\n<font color=blue>excelfile->convert is deprecated : use excel->convert</font>\n";
		return $excel->convert($inpath,$outpath,$timeout);
   	}    	

	/////////////////////////////////////////////////////////////////////////////////////////////////////
};		
?>