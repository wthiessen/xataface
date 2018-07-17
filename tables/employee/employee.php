<?php

class tables_employee {

	function titleColumn(){
		return "concat(`SharkID`,' ',`Employee Name`)";
	}

	
	function getTitle($record){
		return $record->val('SharkID').' '.$record->val('Employee Name');
	}

	
	
	
}