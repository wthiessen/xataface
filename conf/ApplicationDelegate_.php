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
}
