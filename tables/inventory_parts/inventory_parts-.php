<?php

class tables_inventory_parts {



	function part_id__default(){
	//$_GET['ID']
		return $_GET['partid'];
	}
	
	function quant__default(){
		return "1";
	}


	function kitted__default(){
		return "NO";
	}		

    function PARTSS__pullValue($record, $el){
        return $record->val('1111XXXXPN').'<br> '.$record->val('NVDPN').'  MFG PN: '.$record->val('MFGPN').'<br> '.$record->val('DESCRIPTION').'<br>STOCK QTY: '.$record->val('QTY');
    }

    /*function afterSave($record){
		 echo '<script>alert("OK!!");
			window.location.href = "index.php?-table=inventory_parts";
			</script>';
    }*/
	
//	function MFGPN__default(){
//		return $_GET['partid'];
//	}



/*
	function kitted__default(){
		return "NO";
	}

	function block__after_search() {
		Dataface_JavascriptTool::getInstance()
		  ->import('barcode.js');
		echo '<input type="text" class="barcodebox" name="barcodelookup" size="30">';
		
		
		
	function getPermissions(&$record){
		$user =& Dataface_AuthenticationTool::getInstance()->getLoggedInUser();
		if ( $user and $user->val('Role') == 'ADMIN' ){
			
			return Dataface_PermissionsTool::getRolePermissions('ADMIN');
		} else {
			return Dataface_PermissionsTool::READ_ONLY();
		}
	}	*/

	function part_id__renderCell($record){
		//$user =& Dataface_AuthenticationTool::getInstance()->getLoggedInUser();
		//if ( $user and $user->val('Role') == 'ADMIN' ){

			Dataface_JavascriptTool::getInstance()
			  ->import('barcode2.js');
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
	//	} else {	
			//return $record->val('part_id');
	//	}
		

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