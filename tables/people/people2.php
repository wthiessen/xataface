<?php
//include 'Dataface/CopyTool.php';
//include 'testing.php';

	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "sharkmarine";

		$app =& Dataface_Application::getInstance();
		$conn = $app->db();
		
	// Create connection
	//$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 


	// on the CSV file data.
	$records = array();
	
	// first split the CSV file into an array of rows.
	$rows = explode("\n", $data);
	foreach ( $rows as $row ){
		// We iterate through the rows and parse the name, phone number, and email 
		// addresses to that they can be stored in a Dataface_Record object.

		$record = df_get_record('people', array('ID'=>$record->val('ID')));

			 if ( !$record ){
				echo "No record found with ID=1.";
			} else {
			//echo $record->val('Qty')."<br>";
			$qty = $record->val('Qty') + 1;
			$record->setValue('Qty',$qty);	 
			$res = $record->save();
			if ( !PEAR::isError($res) ){
				echo "Record saved successfully with person_id ".$record->val('ID');
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
				
		
		
	}	
	
	
	
	

	
		
			$conn->close();
	
?>