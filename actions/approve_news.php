<?php
class actions_approve_news {
    function handle(&$params){
        // First get the selected records
        $app =& Dataface_Application::getInstance();
        $query =& $app->getQuery();
        $records =& df_get_selected_records($query);

        $updated = 0;  // Count the number of records we update
        $errs = array();   // Log the errors we encounter

        foreach ($records as $rec){
            if ( !$rec->checkPermission('edit'), array('field'=>'approved')) ){
                $errs[] = Dataface_Error::permissionDenied(
                    "You do not have permission to approve '".
                    $rec->getTitle().
                    "' because you do not have the 'edit' permission.");
                continue;
            }
            $rec->setValue('approved', 1);
 
            $res = $rec->save(true /*secure*/);
            if ( PEAR::isError($res) ) $errs[] = $res->getMessage();
            else $updated++;
            
        }
        
        if ( $errs ){
            // Errors occurred.  Let's let the user know.
            // The $_SESSION['--msg'] content will be displayed to the user as a message
            // in the next page request.
            $_SESSION['--msg'] = 'Errors Occurred:<br/> '.implode('<br/> ', $errs);
        } else {
            $_SESSION['--msg'] = "No errors occurred";
        }
        

        $url = $app->url('-action=list');   // A default URL in case no redirect was supplied
        if ( @$_POST['--redirect'] ) $url = base64_decode($_POST['--redirect']);
        $url .= '&--msg='.urlencode($updated.' records were deleted.');

        // Redirect back to the previous page
        header('Location: '.$url);
        exit;
    }
}