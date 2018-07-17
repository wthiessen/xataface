<?php
//include 'Dataface/CopyTool.php';
//include 'testing.php';

class tables_people {
	


	function block__before_body(){
	//function __import__csv(&$data, $defaultValues=array()){

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

	echo '<form action="" method="post">';
	echo '<textarea rows="4" cols="50" name="barcodeinput">
</textarea>
	<input type="submit" value="submitter"></form>';




	$input = $_POST['barcodeinput'];

	//echo $input;
	//$input = isset($_POST['barcodeinput'])?$_POST['barcodeinput']:"";

	//I dont check for empty() incase your app allows a 0 as ID.
	
if (isset($input)) {	
	
	if (strlen($input)==0) {
	  echo 'no input';
	  exit;
	}
	
	$rinput = rtrim($input,"\n");
	
	$arr = explode("\n", str_replace("\r", "", $rinput));	

	//$rows = explode("\n", $arr);
	

	
	
	//$file= rtrim(file_get_contents("import.txt"), "\n" );
	
	//$arr = explode("\n", $file);
	//echo "1";
	
	// first split the CSV file into an array of rows.
	
	
	
	//$rows = explode("\n", $input);
	
	$myarr = array_count_values($arr);
	
	$socal = array();
	$socal = $myarr;
	
	//$rows = explode("\n", $myarr);
	//print_r($socal);


	
	foreach ( $socal as $row=>$rowval ){
		// We iterate through the rows and parse the name, phone number, and email 
		// addresses to that they can be stored in a Dataface_Record object.
			//$rowval = trim($rowval);
		$record = df_get_record('people', array('ID'=>$row));
				//echo '<br>'.$row.' '.$rowval.' ';
			 if ( !$record ){
				echo "No record found with ID=".$row."<BR>";
				$row = "";
				$rowval = "";				
				//create new if not found?
			} else {
				
				//echo $record->val('Qty')."<br>";
				//$qty = $record->val('Qty') + $rowval;
				//$record->setValue('Qty',$qty);	 
				//$res = $record->save();				
				
				
				
				
			if ($rowval <= $record->val('Qty')) {
				$qty = $record->val('Qty') - $rowval;
				echo $record->val('ID')."  ".$qty."  ".$record->val('Name')."  ".$record->val('PhoneNumber')." ";						
				//$record->setValue('Qty',$qty);	 
				//$res = $record->save();
				
				if ( !PEAR::isError($res) ){
					echo "db updated.<br>";
					//file_put_contents("import.txt", "");
					$row = "";
					$rowval = "";
				} else {
					//echo "Error occurred trying to save record: ".$res->getMessage();
				}
				
			}else{
				//not enough stock, remove what's left.. return value of what is required.
				
				
				
				echo 'you wanted '.$rowval.'.  '.$record->val('Qty').' left.  Quantity not removed from stock.  Try again.';
			}
				



			}	
	}	
	
	
	
	
	

}	

		
	$conn->close();
	
	}

	
}