<?php
class actions_testing {
    function handle(&$params){
		df_display('HelloWorld');
	/*	$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "sharkmarine";

		$app = Dataface_Application::getInstance();
		$record = $app->getRecord();

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} else {
		  // echo "Connected!";
		}

		$sql = "SELECT ID FROM nav_inv ORDER BY ID DESC LIMIT 1";
		$value = 0;
		if ($result = $conn->query($sql)) {

			/* fetch associative array
			while ($row = $result->fetch_assoc()) {
				printf ("%s \n", $row["ID"]);
				$value = $row["ID"]+1;
			}

			/* free result set 
			$result->free();
		}

		$sql = "insert into nav_inv (ID,1111XXXXPN,Part_Number,Description,Quantity,BIN,Location,Supplier,Price,PRODUCT,MFGPN,PARTTYPE,Room,Updated)
		select ".$value.
		",1111XXXXPN,Part_Number,Description,Quantity,BIN,Location,Supplier,Price,PRODUCT,MFGPN,PARTTYPE,Room,Updated from nav_inv where id = ".$record->strval('ID'); // This line executes the MySQL query that you typed above

		if ($conn->query($sql)) {
			echo "New record ".$value." created successfully";
			
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}


		$conn->close();	*/
	
		
	   
    }
}
?>
