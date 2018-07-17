//require <jquery.packed.js>
//require <xataface/IO.js>
(function(){
  var $ = jQuery;
  
  //registerXatafaceDecorator() is like $(document).ready() except that it may also be called
  // when a node is loaded via ajax.
  //registerXatafaceDecorator(function(node){
    $('.status-drop-down[data-record-id]', node).change(function(){
		console.log("hey");
	}	
      var recordId = $(this).attr('data-record-id');
      //xataface.IO.update(recordId, {Quantity : $(this).val(), Updated : mydate}, function(res){
        if ( res && res.code == 200 ){
			history.go(0);
			console.log(recordId);
        } else if ( res && res.message ){
          alert('Failed to update issue: '+res.message);
        } else {
          alert('Failed to update issue.  Check server log for details');
        }
    //  })
   // });
  });
  
})();