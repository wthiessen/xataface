<?php
class tables_courses {

    function block__before_body(){
        if(isset($_GET['partid'])){
			$record = new Dataface_Record('courses', array());
			$record->setValues(array(
				'course_id'=>'2222',
				'subject'=>$_GET['partid']
			));
			$res = $record->save();   // Doesn't check permissions
			//  $res = $record->save(null, true);  // checks permissions

			if ( PEAR::isError($res) ){
				// An error occurred
				throw new Exception($res->getMessage());
			}
			
			echo $record->val('course_id');
		}
    }
	
	function beforeHandleRequest(){
		$record = new Dataface_Record('courses', array());
		$record->setValues(array(
			'course_id'=>'1111',
			'subject'=>'11111111'
		));
		$res = $record->save();   // Doesn't check permissions
		//  $res = $record->save(null, true);  // checks permissions

		if ( PEAR::isError($res) ){
			// An error occurred
			throw new Exception($res->getMessage());
		}
		return 'heyyyyyy!';
		return $record->val('course_id');
	}


	
}