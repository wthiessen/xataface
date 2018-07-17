<?php
class actions_hello {
    function handle(&$params){
		$app =& Dataface_Application::getInstance();
//        df_display(array(), 'HelloWorld.html');

    
$record = df_get_record('nav_inv', array('ID'=>$_GET["-search"])); 

 if ( !$record ){
	 
			?>
		<script>
		alert("No part found:<?php echo $_GET["-search"]; ?>");
		window.location.href = "index.php";
		</script>
		<?php	
	 
 } else {



	
	if(!isset($_GET["qtyout"])) {
		?>
		<script>
		var qtyout = prompt("Quantity to Remove:", "1");
		window.location.href = "index.php?-table=nav_inv&-action=hello&ID=" + <?php echo $_GET["-search"]; ?> +"&qtyout=" + qtyout;
	

		</script>
		<?php	
	}	
		





				 
		//echo '<form action="index.php?-action=hello&-table=nav_inv&ID='.$record->val('ID').'" method="get">	 
			//Quantity: <input type="text" name="qty" value="1"><br>
			//WO: <input type="text" name="wo"><br>
			//<button type="submit" value="Submit">Submit</button>
			//';			 

			//$qtyoutin = $_GET["qty"];

		$qtyout = $_GET["qtyout"];
		if(($record->val('Quantity') >= $qtyout)) {
			 
			 $updateqty = $record->val('Quantity') - $qtyout;//$changequant;	
			 
			  $record->setValue('Quantity', $updateqty);
			 $res = $record->save();
			 if ( PEAR::isError($res) ){
				 echo "An error occurred: ".$res->getMessage();
			 } else {
				 //echo "Sucessfully saved record. ".$record->val('ID')." updated quant to ".$record->val('Quantity')."<br><br>";
			 }			 

			 $record = new Dataface_Record('transactions', array());
			 $record->setValues(array(
				 'PartID'=> $pid,
				 'workorder'=> 'NA',
				 'Qty'=> '1',
				 'Date'=> date('Y-m-d')
			 ));
			 $res = $record->save();
			 if ( !PEAR::isError($res) ){
				 ?>
				 <script>
				 alert("Inventory updated succesfully");
				 window.location.href = "index.php";
				 </script>
				 <?php
				 
				 //				 echo "Record saved successfully with person_id ".$record->val('ID');
			 } else {
				 echo "Error occurred trying to save record: ".$res->getMessage();
			 }	 
			 
			 /*
			 if ( !$record ){
				 echo "No record found with person_id=".$record->val('ID');
			 } else {
				// echo sprintf("<br><br>We have loaded a record with <br>ID: %s<br>PartID: %s<br>%s<br>%s",
					 $record->val('ID'),
					 $record->val('PartID'),
					 $record->val('workorder'),
					 $record->val('Qty')
					  
					 
				 );
				 $pid = $record->val('PartID');
				 $transid = $record->val('ID');
				 $changequant = $record->val('Qty');
			 }
*/
			 
		} else {
			//echo 'Not enough stock: '.$record->val('Quantity'); 
			?>
			<script>
			alert("Not enough stock.  Current Qty: <?php echo $record->val('Quantity'); ?>");
			window.location.href = "index.php";
		

			</script>
			<?php	
		}
			
			
			
			
			
			
			
			
			
	 
    }

	 //echo sprintf("ID: %s<br>Part Number: %s<br>Qty: %s<br><br>",
		 //$record->val('ID'),
		 //$record->val('1111XXXXPN'),
		 //$record->val('Quantity')
		 $pid=$record->val('ID');
	 //);
 }


	
}
?>