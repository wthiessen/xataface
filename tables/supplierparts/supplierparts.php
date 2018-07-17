<?php
class tables_supplierparts {
	function titleColumn(){
		return "concat(`PartNum`,' ',`Description`,' ',`Supplier`)";
	}
	
	function getTitle($record){
		return $record->val('PartNum').' '.$record->val('Description').' '.$record->val('Supplier');
	}
}

