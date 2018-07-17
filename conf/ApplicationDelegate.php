<?php
class conf_ApplicationDelegate {


	public function beforeHandleRequest(){
		Dataface_Application::getInstance()
			->addHeadContent(
				sprintf('<link rel="stylesheet" type="text/css" href="%s"/>',
					htmlspecialchars(DATAFACE_SITE_URL.'/style.css')
				)
			);
	
	}
	
	function block__body_atts(){
		$css_classes = array();
		$app = Dataface_Application::getInstance();
		$query = $app->getQuery();
		$css_classes[] = 'table-'.$query['-table'];
		echo 'class="'.htmlspecialchars(implode(' ', $css_classes)).'"';
	}
/*
	function getPermissions(&$record){
		$user =& Dataface_AuthenticationTool::getInstance()->getLoggedInUser();
		if ( $user and $user->val('Role') == 'EDIT' ){
			return Dataface_PermissionsTool::getRolePermissions('EDIT');
		} else if ( $user and $user->val('Role') == 'ADMIN' ){
			return Dataface_PermissionsTool::getRolePermissions('ADMIN');
		}
		return Dataface_PermissionsTool::READ_ONLY();
	}
	*/
	function block__custom_javascripts(){
		echo '
		<link rel="stylesheet" type="text/css" href="https://printjs-4de6.kxcdn.com/print.min.css">
		<link rel="stylesheet" type="text/css" href="js/printjs/src/css/print.css">
		<script src="js/print.min.js"></script>
		<script src="js/printjs/jsprint.js"></script>
		<script src="js/javascripts.js" type="text/javascript" language="javascript"></script>';
	}

  
	
	
	
}
