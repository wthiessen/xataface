
//require <jquery.packed.js>
//require <xataface/IO.js>
(function(){
  var $ = jQuery;
var d = new Date();
mydate = d.getFullYear()+'/'+d.getMonth()+1+'/'+d.getDate();
 
   DBstring = "warehouse_inv?ID=";  
  //registerXatafaceDecorator() is like $(document).ready() except that it may also be called
  // when a node is loaded via ajax.


  
	 registerXatafaceDecorator(function(node){
    // jQuery(document).ready(function(){
		 var recordId = 0;
    $('.status-drop-down', node).change(function(){
		recordId = $(this).attr('data-record-id');

      xataface.IO.update(recordId, {QTY : $(this).val()}, function(res){

        if ( res && res.code == 200 ){
		  alert('Quantity Updated');
		  history.go(0);
        } else if ( res && res.message ){
          alert('Failed to update quantity: You don\'t have permission to update quantity.');
        } else {
          alert('Failed to update field.  Check server log for details');
        }
      })
    });

	
    $('.barcodee').change(function(e){
		alert('barcode barcode!!');
		// Stop acting like a button
        e.preventDefault();

		
		
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
			xataface.IO.update(recordId, {QTY : currentVal + 1}, function(res){
				
				
			if ( res && res.code == 200 ){
				//history.go(0);
				//alert('Quantity Updated');
		
			 // console.log(mydate);
			} else if ( res && res.message ){
			  alert('Failed to update quantity: You don\'t have permission to change quantity.');
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

				xataface.IO.update(recordId, {QTY : currentVal - 1}, function(res){
				if ( res && res.code == 200 ){
					//alert('Quantity Updated');
					history.go(0);
			  //console.log(mydate);
				} else if ( res && res.message ){
				  alert('Failed to update quantity: You don\'t have permission to change quantity.');
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