<?php

class tables_supplierreq {



	
	function titleColumn(){
		return "concat(1111XXXXPN,' ',DESCRIPTION)";
	}
	

	function getTitle(&$record){
		return $record->val("1111XXXXPN").' '.$record->val('DESCRIPTION');
	}

	function DateReq__default(){
		//return "puppies";
		return date("Y-m-d");
	}



	
	
}