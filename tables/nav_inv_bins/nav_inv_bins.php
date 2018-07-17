<?php


class tables_nav_inv_bins {
/*

	function BINNO__default(){



		//$conn = new mysqli($servername, $username, $password, $dbname);
		$app =& Dataface_Application::getInstance();
		$conn = $app->db();

		
		// Check connection
		if($conn->connect_errno > 0){
			die('Unable to connect to database [' . $conn->connect_error . ']');
		}

		//get the last/highest number from the ID column
		$sql = "SELECT * FROM nav_inv_bins ORDER BY BINID DESC LIMIT 1"; // This line executes the MySQL query that you typed above

		//error if connection doesn't work
		if(!$result = $conn->query($sql)){
			die('There was an error running the query [' . $conn->error . ']');
		}

		//query sql line
		if ($result = $conn->query($sql)) {

			/* fetch associative array 
			while ($row = $result->fetch_assoc()) {
				$lastbin = $row['BINNO'];
			}
		/* free result set 
		$result->free();
		}
		//add +1 to barcode for new barcode;
		$newbin = $lastbin + 1;
		
		return $newbin;


		$conn->close();
	
	}
	
*/



}

?>