<?php
namespace Xhe;
use Xhe\XheExcel;
class XheExcelFileCompatible extends XheBaseObject
{
	/////////////////////////////////////////////////////////////////////////////////////////////////////
	
	// �������������� ���� � ������ ������ xlsx,xls,csv,txt,html,pdf,xps (������� ����� ��� ���������� Excel �� ���� 15 ������ �� ����������)
   	function convert($inpath,$outpath,$timeout=600) 
   	{
		$excel = new Xhe\XheExcel($this->server);
		echo "\n<font color=blue>excelfile->convert is deprecated : use excel->convert</font>\n";
		return $excel->convert($inpath,$outpath,$timeout);
   	}    	

	/////////////////////////////////////////////////////////////////////////////////////////////////////
};		
?>