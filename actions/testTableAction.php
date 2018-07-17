<?php
import('Dataface/RecordGrid.php');

class actions_testTableAction {

    // Will be called from Xataface, if this action is called
    function handle(&$params){
        $this->app =& Dataface_Application::getInstance();  // reference to Dataface_Application object

        $result_dummy = array(
            array('testID' => '1', 'name' => 'testname', 
                'description' => 'a short description', 'number' => '258'),
            array('testID' => '2', 'name' => 'another name', 
                'description' => 'a bit longer description to this data set', 'number' => '946'),
            array('testID' => '3', 'name' => 'dummy name', 
                'description' => 'yea, a dummy data set!', 'number' => '1342'),
            array('testID' => '4', 'name' => 'not empty', 
                'description' => 'this data set isn\'t empty ...', 'number' => '282'),
            array('testID' => '5', 'name' => 'your entry', 
                'description' => 'this entry is only for you', 'number' => '79'),
            array('testID' => '6', 'name' => 'no idea', 
                'description' => 'running out of ideas ...', 'number' => '203'),
            array('testID' => '7', 'name' => 'the last one', 
                'description' => 'the end', 'number' => '26841')
        );
        $body = "<br /><br />";
        
        foreach($result_dummy as $row)    // Fetch all rows
        {
            // Maybe do something with the singe rows
            $row['<input type="text" onchange="alert(\'hey!!\')">'] = '<input type="text" onchange="alert(\'hey!!\')">';
            $data[] = $row;    // Add singe row to the data
        }

        $grid = new Dataface_RecordGrid($data,    // Create new RecordGrid with the data
            array('<input type="text" onchange="alert(\'hey!!\')">', 'testID', 'name', 'description', 'number'),    
            //Order and selection of the colums
              null);    // No other labels defined -> it uses keys of the associative array

        $body .= $grid->toHTML();    // Get the HTML of the RecordGrid

        // Shows the content (RecordGrid or error message) in the Main Template
        df_display(array('body' => $body), 'Dataface_Main_Template.html');
    }
}
?>