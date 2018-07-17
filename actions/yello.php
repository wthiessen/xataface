<?php
class actions_yello {
    function handle(&$params){
       //df_display(array(), 'HelloWorld.html');
		
    
	$app =& Dataface_Application::getInstance();
	$conn = $app->db();
		
	// Create connection
	//$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	echo 'Bulk entry for to <B>ADD</B> from Electronics Stock:<BR>
	Use barcode scanner only.<br><form action="" method="post">';
	echo '<textarea rows="10" cols="50" name="barcodeinput" autofocus>
</textarea><br>
	<input type="submit" value="submit"></form>';

if(isset($_POST['barcodeinput'])) {
	

	$input = $_POST['barcodeinput'];

	
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
		$record = df_get_record('nav_inv', array('ID'=>$row));
				//echo '<br>'.$row.' '.$rowval.' ';
			 if ( !$record ){
				echo "No record found with ID=".$row."<BR>";
		
				//create new if not found?
			} else {
				echo '<table border="1">
						<tr>
						<td>Barcode</td>
						<td>Qty Rem.</td>
						<td>Stock</td>
						<td>NVD PN</td>
						<td>1111XXXXPN</td>
						<td>Desc</td>
						</tr>';

					$qty = $record->val('Quantity') + $rowval;
					
					$record->setValue('Quantity',$qty);	 
					$res = $record->save();
					
					if ( !PEAR::isError($res) ){
						echo '<tr>
						<td>'.$record->val('ID').'</td>
						<td>'.$rowval.' added</td>
						<td>'.$record->val('Quantity').'</td>
						<td>'.$record->val('NVDPN').'</td>
						<td>'.$record->val('1111XXXXPN').'</td>
						<td>'.$record->val('Description').'</td>
						</tr>';
						//echo "db updated.<br>";
						//file_put_contents("import.txt", "");
					} else {
						echo "Error occurred trying to save record: ".$res->getMessage();
					}

	

			}	
	}	
				echo '</table><br><a href="javascript:window.close();">Close Window</a>';				
				echo '<script>setTimeout(function(){ myWindow.close() }, 3000);</script>';
	$conn->close();
	}
	}	
	}
}
?>