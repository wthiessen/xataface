
//require <jquery.packed.js>
//require <xataface/IO.js>
(function(){
  var $ = jQuery;
var d = new Date();
mydate = d.getFullYear()+'/'+d.getMonth()+1+'/'+d.getDate();
 
   DBstring = "nav_inv?ID=";  
  //registerXatafaceDecorator() is like $(document).ready() except that it may also be called
  // when a node is loaded via ajax.


  
	 registerXatafaceDecorator(function(node){
    // jQuery(document).ready(function(){
		 var recordId = 0;
    $('.status-drop-down', node).change(function(){
		recordId = $(this).attr('data-record-id');

      xataface.IO.update(recordId, {Quantity : $(this).val(), Updated : mydate}, function(res){

        if ( res && res.code == 200 ){
			location.reload();
			alert('Quantity Updated... You JERK!: '+res.message);
        } else if ( res && res.message ){
          alert('Failed to update field: '+res.message);
        } else {
          alert('Failed to update field.  Check server log for details');
        }
      })
    });


		
    // This button will increment the value
    $('.qtyplus').click(function(e){
		
		// Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
  
		// Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined

		recordId=DBstring+fieldName; 
		
        if (!isNaN(currentVal)) {
           $('input[name='+fieldName+']').val(currentVal + 1);			
			xataface.IO.update(recordId, {Quantity : currentVal + 1, Updated : mydate}, function(res){
				location.reload();
			if ( res && res.code == 200 ){
				location.reload();
				//alert('worked');
			 // console.log(mydate);
			} else if ( res && res.message ){
			  alert('Failed to update field: '+res.message);
			} else {
			  alert('Failed to update field.  Check server log for details');
			}
		})	
            // Increment
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(1);
        }
		
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
		recordId=DBstring+fieldName; 		
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);

				xataface.IO.update(recordId, {Quantity : currentVal - 1, Updated : mydate}, function(res){
				if ( res && res.code == 200 ){
					location.reload();
			  //console.log(mydate);
				} else if ( res && res.message ){
				  alert('Failed to update field: '+res.message);
				} else {
				  alert('Failed to update field.  Check server log for details');
				}			
				})
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(1);
        }
    });
});


  
})();