<?php
import('Dataface/RecordGrid.php');

class actions_query {
    // Will be called from Xataface, if this action is called
    function handle(&$params){
        $this->app =& Dataface_Application::getInstance();  // reference to Dataface_Application object
	    //$this->app =& Dataface_RecordGrid::getInstance(); 
        // Custom query
        $result = mysqli_query($this->app->db(),"select inventoryreq.*,workref.RefID,inventory_parts.invreq_id,inventory_parts.part_id, 
		warehouse_inv.1111XXXXPN,warehouse_inv.DESCRIPTION,warehouse_inv.QTY,employee.EmployeeName,inventory_parts.kitted FROM inventoryreq 
		LEFT JOIN workref ON inventoryreq.WO=workref.ID 
		LEFT JOIN inventory_parts ON inventoryreq.ID=inventory_parts.invreq_id 
		LEFT JOIN employee ON inventoryreq.ReqBy=employee.idEmployee 
		LEFT JOIN warehouse_inv ON inventory_parts.part_id=warehouse_inv.ID 
		ORDER BY ID ASC");
        $body = "<br /><br />";
 

		Dataface_JavascriptTool::getInstance()
		  ->import('editable_nav.js');
	  
		  
		  
	    /*currID = $record->val('ID');
		$currVal = $record->val('Quantity');
		$out = array();
		$out[] = ' <input type="button" value="–" class="qtyminus" field="'.$currID.'" style="font-weight: bold;" /><input type="text" class="status-drop-down" 
		  data-record-id="'.htmlspecialchars($record->getId()).'" name="'.$currID.'" value="'.$currVal.'" size="4">';

		  
		  
		$out[] = '<input type="button" value="+" class="qtyplus" field="'.$currID.'" style="font-weight: bold;" />';
		return implode("\n", $out);
		
		
*/

 
        if(!$result)
        {
            // Error handling
          $body .= "MySQL Error ...";
        }else
        {
            while($row = mysqli_fetch_assoc($result))    // Fetch all rows
            {
                // Maybe do something with the single rows
				
                $row['<input type="text" class="barcodee" name="'.$row['part_id'].'">'] = '<input type="text" class="barcodee" name="'.$row['part_id'].'">';
                $data[] = $row;    // Add singe row to the data
            }
            mysqli_free_result($result); // Frees the result after finnished using it

            $grid = new Dataface_RecordGrid($data,    // Create new RecordGrid with the data
                  array('<input type="text" class="barcodee" name="barcodee">', 'invreq_id', 'RefID', 'part_id', '1111XXXXPN', 'DESCRIPTION', 'QTY', 'EmployeeName', 'kitted'),    
                //Order and selection of the colums
                  null);    // No other labels defined -> it uses keys of the associative array
            
            $body .= $grid->toHTML();    // Get the HTML of the RecordGrid
        }

        // Shows the content (RecordGrid or error message) in the Main Template
        df_display(array('body' => $body), 'Dataface_Main_Template.html');
    }


}
?>