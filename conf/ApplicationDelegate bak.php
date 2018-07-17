<?php
class conf_ApplicationDelegate {
	
	
	
	
	public function beforeHandleRequest(){
		Dataface_Application::getInstance()
			->addHeadContent(
				sprintf('<link rel="stylesheet" type="text/css" href="%s"/>',
					htmlspecialchars(DATAFACE_SITE_URL.'/style.css')


					
				
				
				
				)
			
			);

			
	echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/javascripts.js" type="text/javascript" language="javascript"></script>
	';
	}
    /**
     * Returns permissions array.  This method is called every time an action is 
     * performed to make sure that the user has permission to perform the action.
     * @param record A Dataface_Record object (may be null) against which we check
     *               permissions.
     * @see Dataface_PermissionsTool
     * @see Dataface_AuthenticationTool
     */
     function getPermissions(&$record){
         $auth =& Dataface_AuthenticationTool::getInstance();
         $user =& $auth->getLoggedInUser();
         if ( !isset($user) ) return Dataface_PermissionsTool::NO_ACCESS();
             // if the user is null then nobody is logged in... no access.
             // This will force a login prompt.
         $role = $user->val('Role');
         return Dataface_PermissionsTool::getRolePermissions($role);
             // Returns all of the permissions for the user's current role.
      }
	
	
}

