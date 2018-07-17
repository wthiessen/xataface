<?php
class actions_remove2 {
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


	
if(isset($_POST['IDname'])) {
	
		$id = $_POST['IDname'];
		$qtyremove = $_POST['qtyremove'];
		echo 'entered into the database<br>';
		foreach( $id as $key => $n ) {
			$record = df_get_record('nav_inv', array('ID'=>$id[$key]));
			$qty = $record->val('Quantity') - $qtyremove[$key];
			$record->setValue('Quantity',$qty);	 
			$res = $record->save();			
			if ( !PEAR::isError($res) ){
				echo $id[$key]." Qty: ".$qtyremove[$key]."  Qty left:".$qty."<br>";				
			} else {
				echo "Error occurred trying to save record: ".$res->getMessage();
			}			

			
		}

} else {
	

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
		echo '<form action="" method="post"><b>Press CONFIRM below to commit changes to database</b>';
		echo '<table border="0">';
		
		
		echo '<tr>
				<td><b>Barcode</b></td>
				<td><b>Qty to Remove</b></td>
				<td><b>Remaining Stock</b></td>
				<td><b>NVD PN</b></td>
				<td><b>1111XXXXPN</b></td>
				<td><b>Desc</b></td>
				</tr>';
		
		//CONFIRM LIST BY USER BEFORE SUBMITTING - GIVE CHANCE TO UPDATE PN/QTY
		$n = 0;
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

					if ($rowval <= $record->val('Quantity')) {
						$qty = $record->val('Quantity') - $rowval;
						
						//$record->setValue('Quantity',$qty);	 
						//$res = $record->save();
						
	//					if ( !PEAR::isError($res) ){
													
							echo '<tr>
							<td><input name="IDname[]" size="8" value="'.$record->val('ID').'"></td>
							<td><input name="qtyremove[]" size="2" value="'.$rowval.'"></td>
							<td>'.$record->val('Quantity').'</td> 
							<td>'.$record->val('NVDPN').'</td>
							<td>'.$record->val('1111XXXXPN').'</td>
							<td>'.$record->val('Description').'</td>
							</tr>';
							//echo "db updated.<br>";
							//file_put_contents("import.txt", "");
	//					} else {
	//						echo "Error occurred trying to save record: ".$res->getMessage();
	//					}
						
					}else{
						//not enough stock, remove what's left.. return value of what is required.
							$rowval = $record->val('Quantity');
							
							if ($record->val('Quantity') != 0){
								echo '<tr>
								<td><input name="IDname[]" size="8" value="'.$record->val('ID').'"></td>
								<td><input name="qtyremove[]" size="2" value="'.$rowval.'"></td>
								<td><font color="red"><b>'.$record->val('Quantity').'</b></font></td> 
								<td>'.$record->val('NVDPN').'</td>
								<td>'.$record->val('1111XXXXPN').'</td>
								<td>'.$record->val('Description').'</td>
								</tr>';					
							} else {
								echo '<tr>
								<td>'.$record->val('ID').'</td>
								<td><font color="red"><b>'.$rowval.'</b></font></td>
								<td><font color="red"><b>'.$record->val('Quantity').'</b></font></td> 
								<td>'.$record->val('NVDPN').'</td>
								<td>'.$record->val('1111XXXXPN').'</td>
								<td>'.$record->val('Description').'</td>
								</tr>';								
							}



					}
		
					

				}	
		}	
		
		echo '</table><br><input type="submit" value="Confirm"></form><a href="javascript:window.close();">Close Window</a>';

		
		//$_POST['name']
		

		
		echo '<script>setTimeout(function(){ myWindow.close() }, 3000);</script>';


		
		$conn->close();
		}
		} else {
			echo '<form action="" method="post">';
				echo 'Bulk entry for to <B>REMOVE</B> from Electronics Stock:<BR>
		Use barcode scanner only.<br>';
		echo '<textarea rows="10" cols="50" name="barcodeinput" autofocus>
	</textarea><br>
		<input type="submit" value="submit"></form>';
		
		}


}	
	
	
	}
}
?>