<?php

class tables_inventoryreq {

	function kitted__default(){
		return "NO";
	}


	
	function titleColumn(){
		return "concat(1111XXXXPN,' ',DESCRIPTION)";
	}
	

	function getTitle(&$record){
		return $record->val("1111XXXXPN").' '.$record->val('DESCRIPTION');
	}
/*
	function block__before_form(){
		//Dataface_JavascriptTool::getInstance()
		//  ->import('navtest.js');

		//$out = array();
		echo '<input type="text" onchange="showUser(this.value)" id="lookup"><b><div id="txt2"></div></b><div id="txt1"></div><div id="txt3"></div>';
		
		//echo '<input type="button" value="+" class="qtyplus" style="font-weight: bold;" />';
		//return implode("\n", $out);
	}
	*/
	function DateReq__default(){
		//return "puppies";
		return date("Y-m-d");
	}


	function Part_id__renderCell($record){
  
		Dataface_JavascriptTool::getInstance()
		  ->import('barcode.js');
	  
		  
	   $currID = $record->val('Part_id');
	   echo $currID;
		//$currVal = $record->val('Quantity');
		$out = array();
		$out[] = '<input type="text" class="barcodebox" data-record-id="'.htmlspecialchars($record->getId()).'" name="'.htmlspecialchars($record->getId()).'" value="" size="6">';
		return implode("\n", $out);
		
	}
	
	
}