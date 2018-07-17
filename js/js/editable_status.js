//require <jquery.packed.js>
//require <xataface/IO.js>
(function(){
  var $ = jQuery;
  
  //registerXatafaceDecorator() is like $(document).ready() except that it may also be called
  // when a node is loaded via ajax.
  registerXatafaceDecorator(function(node){
    $('select.status-drop-down[data-record-id]', node).change(function(){
      var recordId = $(this).attr('data-record-id');
      xataface.IO.update(recordId, {kitted : $(this).val()}, function(res){
        if ( res && res.code == 200 ){
          alert('Issue updated successfully');
        } else if ( res && res.message ){
          alert('Failed to update issue: '+res.message);
        } else {
          alert('Failed to update issue.  Check server log for details');
        }
      })
    });
  });
  
})();