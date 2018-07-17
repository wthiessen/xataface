<?php

class tables_serialnum {
	
	function SERIALNUM__default(){
		$servername = "sharkpoint:81";
		$username = "root";
		$password = "";
		$dbname = "sharkmarine";
		
		$app =& Dataface_Application::getInstance();
		// Create connection

		//$link = mysqli_connect("localhost", "my_user", "my_password", "world");

		$conn = $app->db();


		//$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if($conn->connect_errno > 0){
			die('Unable to connect to database [' . $conn->connect_error . ']');
		}

		$query = "SELECT * FROM sn_year";

		if ($result = $conn->query($query)) {

			/* fetch associative array */


		while ($row = mysqli_fetch_assoc($result)) {
			if ($row["YEAR"] == date("Y")) $yeario = $row["CODE"];
				
		}	


			
			/* free result set */
			$result->free();
		}


		$query = "SELECT * FROM sn_month";

		if ($result = $conn->query($query)) {

			/* fetch associative array */

		while ($row = mysqli_fetch_assoc($result)) {
			if ($row["MONTH"] == date("m")) $monthio = $row["CODE"];
			
		}	
			
			/* free result set */
			$result->free();
		}


		//$sql = "SELECT MAX(ID) FROM serialnum"; // This line executes the MySQL query that you typed above////
		$sql = "SELECT MAX(ID) FROM `serialnum`"; // This line executes the MySQL query that you typed above

		if(!$result = $conn->query($sql)){
			die('There was an error running the query [' . $conn->error . ']');
		}


		while($row = $result->fetch_assoc()){
			$serialno = max($row) + 1;
			$serial1 = max($row) + 1;
		}

		//$count = $serialno;

	
		$aa = substr($serialno, -1);    // returns "f"
		$ab = substr($serialno, -2,1);    // returns "ef"
		$ac = substr($serialno, -3,1); // returns "d"
		$ad = substr($serialno, -4,1); // returns "d"

		$checksum = $aa + $ab + $ac + $ad;

		$serial2 = substr($checksum, -1);

		$newserial = $yeario.$monthio."-".$serial1.$serial2;

		return $newserial;


		$conn->close();
					
				
	}
	



	
	function ID__default(){
		$servername = "sharkpoint:81";
		$username = "root";
		$password = "";
		$dbname = "sharkmarine";
		
		$app =& Dataface_Application::getInstance();
		// Create connection

		//$link = mysqli_connect("localhost", "my_user", "my_password", "world");

		$conn = $app->db();
		//$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if($conn->connect_errno > 0){
			die('Unable to connect to database [' . $conn->connect_error . ']');
		}
		$sql = "SELECT MAX(ID) FROM `serialnum`"; // This line executes the MySQL query that you typed above
		if(!$result = $conn->query($sql)){
			die('There was an error running the query [' . $conn->error . ']');
		}


		while($row = $result->fetch_assoc()){
			$serialno = max($row) + 1;
		}

		return $serialno;
	}	
			
			
			
}
?>