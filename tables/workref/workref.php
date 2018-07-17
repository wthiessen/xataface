<?php

class tables_workref {

	function titleColumn(){
		return "concat(`RefID`,' ',`Reference Desc`)";
	}

	
	function getTitle($record){
		return $record->val('RefID').' '.$record->val('Reference Desc');
	}

	
	
	
}