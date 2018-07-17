//require <jquery.packed.js>
//require <xataface/IO.js>

function checkbox() {
  var $ = jQuery;
  
  //registerXatafaceDecorator() is like $(document).ready() except that it may also be called
  // when a node is loaded via ajax.
  registerXatafaceDecorator(function(node){
    $('select.status-drop-down[data-record-id]', node).click(function(){
      var recordId = $(this).attr('data-record-id');
	  //alert($(this).val());
      xataface.IO.update(recordId, {accountedge : $(this).val()}, function(res){
        //alert(res.code);
		if ( res && res.code == 200 ){
          alert('Database updated successfully');
		  history.go(0);
        } else if ( res && res.message ){
          alert('Failed to update database: '+res.message);
        } else {
          alert('Failed to update database.  Check server log for details');
        }
      })
    });

  }
