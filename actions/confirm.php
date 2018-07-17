<?php

    
		$app =& Dataface_Application::getInstance();
		$conn = $app->db();
		
	// Create connection
	//$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 


	
	if(isset($_POST['ID'])) {
		
		echo 'post id';
		//$id = $_POST['ID'];
		//$qtyremove = $_POST['qtyremove'];
		
		//foreach( $id as $key => $n ) {
		//	echo "The ID is ".$id[$key]." and Qty to remove is ".$qtyremove[$key]."\n";
		//}

	} 
	
	
	

?>