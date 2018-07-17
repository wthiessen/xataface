<?php
//include 'Dataface/CopyTool.php';
//include 'testing.php';

class tables_nav_inv {

	

	function barcode__default(){
		$app =& Dataface_Application::getInstance();
		$conn = $app->db();
		
		if ($_GET["-action"]="new") {
		
			// Check connection
			if($conn->connect_errno > 0){
				die('Unable to connect to database [' . $conn->connect_error . ']');
			}

			//get the last/highest number from the ID column
			$sql = "SELECT ID FROM nav_inv ORDER BY ID DESC LIMIT 1"; // This line executes the MySQL query that you typed above

			//error if connection doesn't work
			if(!$result = $conn->query($sql)){
				die('There was an error running the query [' . $conn->error . ']');
			}

			//query sql line
			if ($result = $conn->query($sql)) {

				/* fetch associative array */
				while ($row = $result->fetch_assoc()) {
					$lastid = $row['ID'];
				}
			/* free result set */
			$result->free();
			}
			//add +1 to barcode for new barcode;
			$newid = $lastid + 1;
			
			$newbarcode = "SM-".$newid;
		} else {
			$newbarcode = '';
		}
		return $newbarcode;

		$conn->close();
	}
	

	 function beforeSave($record){
		 $date = date('Y/m/d');
        $record->setValue('Updated', 
            $date
        );
    }

	function Quantity__renderCell($record){
	  
		Dataface_JavascriptTool::getInstance()
		  ->import('editable_nav.js');
	  
		  
	   $currID = $record->val('ID');
		$currVal = $record->val('Quantity');
		$out = array();
		$out[] = ' <input type="button" value="–" class="qtyminus" field="'.$currID.'" style="font-weight: bold;" /><input type="text" class="status-drop-down" 
		  data-record-id="'.htmlspecialchars($record->getId()).'" name="'.$currID.'" value="'.$currVal.'" size="4">';

		  
		  
		$out[] = '<input type="button" value="+" class="qtyplus" field="'.$currID.'" style="font-weight: bold;" />';
		return implode("\n", $out);
	  }
	  
	  

	  	  /*
	 function block__after_barcode_widget($record){   
		$app =& Dataface_Application::getInstance();
		$conn = $app->db();
		
		// Check connection
		if($conn->connect_errno > 0){
			die('Unable to connect to database [' . $conn->connect_error . ']');
		}

		$sql = "SELECT ID FROM nav_inv ORDER BY ID DESC LIMIT 1"; // This line executes the MySQL query that you typed above

		//error if connection doesn't work
		if(!$result = $conn->query($sql)){
			die('There was an error running the query [' . $conn->error . ']');
		}

		//query sql line
		if ($result = $conn->query($sql)) {

			/* fetch associative array 
			while ($row = $result->fetch_assoc()) {
				$lastid = $row['ID'];
			}
		/* free result set 
		$result->free();
		}
		//add +1 to barcode for new barcode;
		$newid = $lastid + 1;
		
		if($_GET['-action'] == 'edit') {
			$newbarcode = $lastid;
		} else {
			$newbarcode = $newid;
			
		}
		
			
		echo " <script>  function openWin()
  {
    var myWindow=window.open('barcode.php?codetype=Code39&size=20&text=".$newbarcode."&print=true','','width=600,height=600');
   // myWindow.document.write('<p>This is myWindow</p>');
    
    //myWindow.document.close();
myWindow.focus();
myWindow.print();
//myWindow.close();
    
  }</script>";
		
		//'.$record->val('ID').
		
		
		
		//echo $img;
		
		echo '<img alt="TESTING" src="barcode.php?codetype=Code39&size=20&text='.$newbarcode.'&print=true" />
		
		 <button type="button" onclick="openWin()">
    Print Barcode
 </button>

		
		
		<div id="invc">
		
		';

	 }*/
	 //<img alt="TESTING" id="4242" src="barcode.php?codetype=Code39&size=20&text='.$record->val('ID').'&print=true" /></div>
//barcode.php?codetype=Code39&size=20&text=test
//printJS(\', \'image\');		
//window.open(\'', \'_blank\',\'toolbar=no,scrollbars=yes,resizable=no,top=100,left=100,width=200,height=200\')
  
}