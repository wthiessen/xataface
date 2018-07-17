<?php

//require_once 'xataface/dataface-public-api.php';

// Initialize Xataface framework
//df_init(__FILE__, 'xataface')->display();

//require_once 'xataface/init.php';
   // init(__FILE__, 'http://mydomain.com/path/to/dataface');

//require_once 'xataface/Dataface/Application.php';
//$app =& Dataface_Application::getInstance();

//require_once 'xataface/Dataface/Table.php';
 //$studentsTable =& Dataface_Table::loadTable('nav_inv');

	
	//$conn = $app->db();
		
	// Create connection
	$conn = new mysqli('sharkpoint:81', 'root', '', 'sharkmarine');
	// Check connection
	//if ($conn->connect_error) {
	//	die("Connection failed: " . $conn->connect_error);
	//} 


	
	if(isset($_POST['ID'])) {
		
		
		$id = $_POST['ID'];
		$qtyremove = $_POST['qtyremove'];
		echo 'entered into the database<br>';
		foreach( $id as $key => $n ) {
			echo $id[$key]." Qty: ".$qtyremove[$key]."<br>";
		}
	} 
	

	

?>