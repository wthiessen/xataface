<?php
class tables_inventory {

		

			
	function getPermissions(&$record){
		$user =& Dataface_AuthenticationTool::getInstance()->getLoggedInUser();
		if ( $user and $user->val('Role') == 'ADMIN' ){
			
			return Dataface_PermissionsTool::getRolePermissions('ADMIN');
		} else {
			return Dataface_PermissionsTool::READ_ONLY();
		}
	}

	
	
	


// If there was an auto increment  id field, it will now be populated
		//
	
	
	
	function titleColumn(){
		return "concat(`1111XXXXPN`,' ',`NVDPN`,' ',`MFGPN`),' ',`description`)";
	}
	
	function getTitle($record){
		return $record->val('1111XXXXPN').' '.$record->val('NVDPN').' '.$record->val('MFGPN').' '.$record->val('description');
	}
	
//<input type="button" value="request" class="request" field="'.$currID.'" style="font-weight: bold;" />
	/*
	function QTY__renderCell($record){
	  
		Dataface_JavascriptTool::getInstance()
		  ->import('editable_warehouse2.js');
	  //onclick="warehouse_req()"/>
		  
	   $currID = $record->val('ID');
		$currVal = $record->val('QTY');
		$out = array();
		$out[] = '
		
		<input type="button" value="–" class="qtyminus" field="'.$currID.'" style="font-weight: bold;" /><input type="text" class="status-drop-down" 
		  data-record-id="'.htmlspecialchars($record->getId()).'" name="'.$currID.'" value="'.$currVal.'" size="4">';

		  
		  
		$out[] = '<input type="button" value="+" class="qtyplus" field="'.$currID.'" style="font-weight: bold;" />';
		return implode("\n", $out);
	}*/
	
	function REQUEST__renderCell($record){
	  
		Dataface_JavascriptTool::getInstance()
		  ->import('editable_warehouse21.js');
	  //onclick="warehouse_req()"/>
		  
	   $currID = $record->val('ID');
		$out = array();
		$out[] = '<a href="http://sharkpoint:81/shark/index.php?-table=inventory_parts&-action=new&partid='.$currID.'"><b>Request Part</b></a> ';
		//$out[] = '<a href="http://sharkpoint:81/shark/index.php?-action=new_invreq&partid='.$currID.'"><b>Request Part</b></a> ';
		//$out[] = '<form action="http://sharkpoint:81/shark/index.php?-action=new_invreq&partid='.$currID.'" method="get">
		//<button type="submit" value="Request Part" class="" style="font-weight: bold;" />Request Part</button>
		//</form> '.$record->val('MFGPN');
		
		///$out[] = '<input type="button" value="request" class="request" field="'.$currID.'" style="font-weight: bold;" /> '.$record->val('MFGPN');
		
		return implode("\n", $out);
	}
	
	/*
	function QTY__renderCell($record){
	  
		Dataface_JavascriptTool::getInstance()
		  ->import('editable_warehouse2.js');
	  
		  
	   $currID = $record->val('ID');
		$currVal = $record->val('QTY');
		$out = array();
		$out[] = ' <input type="button" value="–" class="qtyminus" field="'.$currID.'" style="font-weight: bold;" /><input type="text" class="status-drop-down" 
		  data-record-id="'.htmlspecialchars($record->getId()).'" name="'.$currID.'" value="'.$currVal.'" size="4">';

		  
		  
		$out[] = '<input type="button" value="+" class="qtyplus" field="'.$currID.'" style="font-weight: bold;" />';
		return implode("\n", $out);
	}	*/
	
}