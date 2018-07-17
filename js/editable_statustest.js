//require <jquery.packed.js>
//require <xataface/IO.js>
(function(){
  var $ = jQuery;
  
  //registerXatafaceDecorator() is like $(document).ready() except that it may also be called
  // when a node is loaded via ajax.
$(document).ready(function() {
    //set initial state.

    $('#checkbox1').click(function() {
        if (!$(this).is(':checked')) {
            return confirm("Are you sure?");
        }
    });
});
  
})();