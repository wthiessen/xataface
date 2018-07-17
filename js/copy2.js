//require <jquery.packed.js>
//require <xataface/IO.js>
//require <xatajax.form.core.js>

(function(){
  var $ = jQuery;
  DBstring = "nav_inv?ID=";  
  


	var bla = $('#Quantity').val();
  
	 registerXatafaceDecorator(function(node){
    // jQuery(document).ready(function(){
		 var recordId = 0;
		
		 
 
		$('.copyrecord', node).click(function(){
			recordId = $(this).attr('data-record-id');
			console.log(bla);
		
	
			xataface.IO.update(recordId, {Quantity : $('#Quantity').val()}, function(res){
				if ( res && res.code == 200 ){
					//location.reload();
					history.go(0);
					console.log('updated record:');
				//console.log(recordId);
				} else if ( res && res.message ){
				alert('Failed to update field: '+res.message);
				} else {
			  alert('Failed to update field.  Check server log for details');
				}
			})
		})
				

 /*      if ( res && res.code == 200 ){
			//location.reload();
			console.log('updated record:');
         //console.log(recordId);
        } else if ( res && res.message ){
          alert('Failed to update field: '+res.message);
        } else {
          alert('Failed to update field.  Check server log for details');
        }
      })
    });*/

	})	
  //select.status-drop-down[data-record-id]

  
})();