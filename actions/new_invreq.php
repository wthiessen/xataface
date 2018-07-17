<?php
class actions_new_invreq {
   function handle(&$params){
	if(isset($_GET["partid"])){
		 $record = new Dataface_Record('inventory_parts', array());
		 $record->setValues(array(
			 'part_id'=> $_GET['partid'],
			 'quant'=> '1',
			 'QtyFull'=> '0',
			 'accountedge'=> '0',
			 'kitted'=> 'NO',
			 'date'=> date("Y-m-d")
		 ));
		 $res = $record->save();
		  
		 
		 //$record->val('id');
		 if ( !PEAR::isError($res) ){
			 //alert("'.$record->val('ID').' New Request Created.  Complete by entering Workorder and your name")
			 echo '<script>
			 window.location.href = "index.php?-table=inventory_parts&-action=edit&-recordid=inventory_parts?ID='.$record->val('ID').'"</script>';
			 //				 echo "Record saved successfully with person_id ".$record->val('ID');
		 } else {
			 echo "Error occurred trying to save record: ".$res->getMessage();
		 }	 

	}
	/*	 
	} else {
		//echo 'Not enough stock: '.$record->val('Quantity'); 
		?>
		<script>
		alert("Not enough stock.  Current Qty: <?php echo $record->val('Quantity'); ?>");
		window.location.href = "index.php";


		</script>
		<?php	
	}*/
   }	
}

?>