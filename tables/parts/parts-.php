<?php



class tables_parts {


function beforeSave(Dataface_Record $record){
	 
	 
	 
				$mysqli = new mysqli("localhost", "root", "", "sharkmarine");

				/* check connection */
				if (mysqli_connect_errno()) {
					printf("Connect failed: %s\n", mysqli_connect_error());
					exit();
				}

				$sql="SELECT * FROM parts";

				if ($result=mysqli_query($mysqli,$sql))
				  {
				  // Get field information for all fields
				  $fieldinfo=mysqli_fetch_fields($result);

				  foreach ($fieldinfo as $val)
					{
						if ( $record->valueChanged($val->name)){
							$record->setValue('Updated', date('Y/m/d'));
						}
						
						
					}
				  // Free result set
				  mysqli_free_result($result);
				}


				/* close connection */
				$mysqli->close(); 
	 

 }

  
  function Quantity__renderCell(Dataface_Record $record){
  
    Dataface_JavascriptTool::getInstance()
      ->import('editable_status2.js');
   
   $currID = $record->val('PartID');
    $currVal = $record->val('Quantity');
    $out = array();
    $out[] = ' <input type="button" value="–" class="qtyminus" field="'.$currID.'" style="font-weight: bold;" /><input type="text" class="status-drop-down" 
      data-record-id="'.htmlspecialchars($record->getId()).'" name="'.$currID.'" value="'.$currVal.'" size="4">';

    $out[] = '<input type="button" value="+" class="qtyplus" field="'.$currID.'" style="font-weight: bold;" />';
    return implode("\n", $out);
  }
  
  
  
}