<?php
class actions_remove {
    function handle(&$params){
       df_display(array(), 'HelloWorld.html');
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
			echo '<script>setTimeout(function () { self.close();}, 3000);</script>';
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
			unset($_POST['IDname']);
			echo '<a href="javascript:window.close();">Close Window</a>';
		} else {
			if(isset($_POST['barcodeinput'])) {
				
				$input = rtrim($_POST['barcodeinput']);
				
				if (isset($input)) {	
					if (strlen($input)==0) {
					  echo 'no input';
					  exit;
					}
				$rinput = rtrim($input,"\n");
				$arr = explode("\n", str_replace("\r", "", $rinput));	
				$myarr = array_count_values($arr);
				$socal = array();
				$socal = $myarr;

				echo '<form action="" method="post"><b>Press CONFIRM below to commit changes to database</b><br><br>';
				echo '<table border="0" cellpadding="3" cellspacing="0">';
				echo '<tr>
						<th><b>Barcode</b></th>
						<th><b>Qty to Remove</b></th>
						<th><b>Remaining Stock</b></th>
						<th><b>NVD PN</b></th>
						<th><b>1111XXXXPN</b></th>
						<th><b>Desc</b></th>
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
							echo '<font color="red"><p><b>No part found with ID='.$row.'</p></font>';
							//create new if not found?
						} else {
							
							//if ($_POST['-action']) == "remove") {
								$left = $rowval;
								$right = $record->val('Quantity');
							//}

							$zerostock = 0;
							if ($left <= $right) {
								$qty = $record->val('Quantity') - $rowval;
									echo '<tr>
									<td><input name="IDname[]" size="6" value="'.$record->val('ID').'"></td>
									<td><input name="qtyremove[]" size="2" value="'.$rowval.'"></td>
									<td>'.$record->val('Quantity').'</td> 
									<td>'.$record->val('NVDPN').'</td>
									<td>'.$record->val('1111XXXXPN').'</td>
									<td>'.$record->val('Description').'</td>
									</tr>';
							}else{
								//not enough stock, remove what's left.. return value of what is required.
								$rowval = $record->val('Quantity');
								if ($record->val('Quantity') != 0){
									echo '<tr>
									<td><input name="IDname[]" size="6" value="'.$record->val('ID').'"></td>
									<td><input name="qtyremove[]" size="2" value="'.$rowval.'"></td>
									<td><font color="red"><b>'.$record->val('Quantity').'</b></font></td> 
									<td><s>'.$record->val('NVDPN').'</td>
									<td>'.$record->val('1111XXXXPN').'</td>
									<td>'.$record->val('Description').'</td>
									</tr>';					
								} else {
									$zerostock = 1;
									echo '<tr>
									<td><s>'.$record->val('ID').'</td>
									<td><s><font color="red"><b>'.$rowval.'</b></font></td>
									<td><s><font color="red"><b>'.$record->val('Quantity').'</b></font></td> 
									<td><s>'.$record->val('NVDPN').'</td>
									<td><s>'.$record->val('1111XXXXPN').'</td>
									<td><s>'.$record->val('Description').'</td>
									</tr>';								
								}
							}
						}	
				}	

				
				echo '</table>';
								if ($zerostock == 1 ) {
					echo '<s>0</s> = No stock.  Part removed from request.<br>';
				}
				
				echo '<br><input type="submit" value="Confirm"></form>';
				
				
			
				
				
				
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