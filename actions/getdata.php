<?php
 	
	
	//IMPORT FILE INTO ARRAY
	
	// FOR EACH LINE LOOK UP FIRST VALUE AS ID
	
	// UPDATE QTY BY ONE FOR EACH BARCODE ID
	
	
	
 $record = df_get_record('people', array('ID'=>$_GET['ID']));
 if ( !$record ){
     echo "No record found with person_id=1.";
 } else {
	//echo $record->val('Qty')."<br>";
	$qty = $record->val('Qty') + 1;
	$record->setValue('Qty',$qty);	 
	$res = $record->save();
	if ( !PEAR::isError($res) ){
		echo "Record saved successfully with person_id ".$record->val('person_id');
	} else {
		echo "Error occurred trying to save record: ".$res->getMessage();
	}

	
	echo sprintf("%s %s %s %s",
		//$qty = $row["Qty"] + 1;

	 
         $record->val('ID'),
         $record->val('Name'),
         $record->val('PhoneNumber'),
         $record->val('Qty')		 
     );
 }
 
 ?>