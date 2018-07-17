<?php

class tables_iwos {

	function titleColumn(){
		return "concat(`Int Work Order`,' ',`Reference`),' ',`Part Number`),' ',`CompleteFabrication`)";
	}

	
	function getTitle($record){
		return $record->val('Int Work Order').' '.$record->val('Reference').' '.$record->val('Part Number').' '.$record->val('CompleteFabrication');
	}

	
	
	
}