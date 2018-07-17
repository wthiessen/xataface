<?php

class tables_inventory_parts {

	function getPermissions(&$record){
		$user =& Dataface_AuthenticationTool::getInstance()->getLoggedInUser();
		if ( $user and $user->val('Role') == 'ADMIN' ){
			
			return Dataface_PermissionsTool::getRolePermissions('ADMIN');
		} else {
			return Dataface_PermissionsTool::getRolePermissions('EDIT');
		}
	}

	function part_id__default(){
	//$_GET['ID']
		return $_GET['partid'];
	}
	
	function quant__default(){
		return "1";
	}
	function QtyFull__default(){
		return "0";
	}

	function kitted__default(){
		return "NO";
	}		
	
	function date__default(){
		return date("Y-m-d");
	}
	
	function accountedge__default(){
		return "0";
	}
	
	function getTitle($record){
		return $record->val('1111XXXXPN').' '.$record->val('NVDPN').' '.$record->val('MFGPN').' '.$record->val('description');
	}
	
    function PARTSS__default($record){
		
		if(isset($_GET['partid'])) {	
			$record = df_get_record('inventory', array('ID'=>$_GET['partid']));
			//return $record->val('1111XXXXPN');

		} else {
			$record = df_get_record('inventory', array('ID'=>$record->val('ID')));
		}
		
		return 
		'SHARK NUM: '.$record->val('1111XXXXPN').'<br> '.
		'DESC: '.$record->val('NVDPN').'<br> '.
		'MFG PN: '.$record->val('MFGPN').'<br> '.
		'DESC: '.$record->val('description').'<br> '.
		'STOCK QTY: '.$record->val('QTY');
		
    }


	function part_id__renderCell($record){
		$user =& Dataface_AuthenticationTool::getInstance()->getLoggedInUser();
		
		if($record->val('kitted')=='NO') {
		
			if ( $user and $user->val('Role') == 'ADMIN' ){

				Dataface_JavascriptTool::getInstance()
				  ->import('barcode21.js');
			  //on field change: get text value... compare barcode entry number to part number in field... if the same remove stock!
				  
				$currID = $record->val('part_id');
				$kitted = $record->val('kitted');
				$reqqty = $record->val('quant');
				$stock = $record->val('QTY');
				$qtyfull = $record->val('QtyFull');
				
			   //echo $currID;
				//$currVal = $record->val('Quantity');
				$out = array();
				$out[] = '<button class="barcodebox" data-record-id="'.htmlspecialchars($record->getId()).'" name="'.$currID.','.$kitted.','.$reqqty.','.$stock.','.$qtyfull.'" size="6">Complete</button>';
				return implode("\n", $out);
			} 
			$record->val('part_id');
		}

	}
	/*
	function accountedge__permissions($record){
		$user =& Dataface_AuthenticationTool::getInstance()->getLoggedInUser();
		if ( $user and $user->val('Role') == 'ADMIN' ){
			return null;
		} else {
			return array('view'=>0);
		}
		
	}
	

	
	function accountedge__renderCell(Dataface_Record $record){

		Dataface_JavascriptTool::getInstance()
		  ->import('editable_status.js');
		  
		$options = array(
		  'Select...',
		  'Closed'
		);
		$currVal = $record->val('accountedge');
		$out = array();
		$out[] = '<select class="status-drop-down" 
		  data-record-id="'.htmlspecialchars($record->getId()).'">';
		foreach ( $options as $opt ){
		  $selected = ($currVal === $opt) ? 'selected':'';
		  $out[] = '<option value="'.htmlspecialchars($opt).'" '.$selected.'>'
			.htmlspecialchars($opt).'</option>';
		  
		}
		$out[] = '</select>';
		return implode("\n", $out);
	  }
  
*/
	
	
	
	}