
//require <jquery.packed.js>
//require <xataface/IO.js>
(function(){
  var $ = jQuery;
var d = new Date();
mydate = d.getFullYear()+'/'+d.getMonth()+1+'/'+d.getDate();
 
   
  //registerXatafaceDecorator() is like $(document).ready() except that it may also be called
  // when a node is loaded via ajax.


  
	 registerXatafaceDecorator(function(node){
    // jQuery(document).ready(function(){
		 var recordId = 0;


	
		$('.barcodebox').change(function(e){
			recordId = $(this).attr('data-record-id');

			
			var res = $(this).attr('name').split(",");
			warehouseid = "warehouse_inv?ID=" + res[0];  
			
			//alert(res[0] + '  ' + res[1]);
			var reqstock = parseInt(res[2]); //reqstock
			var n = res[1]; //kitted
			var stockqty = parseInt(res[3]); //stockqty
			var p = parseInt(res[0]); //id
			var qtyfull = parseInt(res[4]); //qtyfull
			//alert(qtyfull);
			//var nn = n.toString()
			
			//alert(n);
			if (n != "YES") { //check if part is kitted yet
			
				//alert(warehouseid + ' ' + stockqty);
				
				
				if (p == $(this).prop('value')) {

					/*if (stockqty > reqstock) {
							alert('stock less than req qty.  adjusted req qty');
							reqstock = stockqty;
					}
				
					if (res[1] >= res[2]) {
						alert(res[1] + " PART ALREADY KITTED!!");
						history.go(0);
					} else {
					*/
						//var n = n + 1;
						
						
						
						//if (qtyfull > 0) {
						//	reqstock = reqstock - qtyfull;
						//}
						alert ('STOCK QTY :' + stockqty + 'REQUESTED STOCK:' + reqstock);
						if (stockqty > 0 && reqstock > 0) {
							
			
							var reqstock = reqstock - qtyfull;
							var newstock = stockqty - reqstock;
							
							if (reqstock > stockqty) {
								reqstock = stockqty;
								
								alert('NOTE: NOT ENOUGH STOCK TO FUFILL REQUEST.  PLEASE ORDER MORE.  KITTING QTY' + reqstock);
								kit = "PARTIAL";
								//full = qtyfull + reqstock;
							} else {
								kit = "YES";
								
							}
							full = reqstock + qtyfull;
							//alert ('UPDATED STOCK:' + newstock + 'REQUESTED STOCK:' + reqstock + 'FUFFILLED:' + full + 'KITTED:' + kit);
							
							//alert(o);
							
							xataface.IO.update(recordId, {kitted : kit, QTY : newstock, QtyFull : full}, function(res){
								if ( res && res.code == 200 ){
								 // alert('part kitted');
								  history.go(0);
								} else if ( res && res.message ){
								  alert('Failed to update field: '+res.message);
								} else {
								  alert('Failed to update field.  Check server log for details');
								}
							});			
							
							
							
							xataface.IO.update(warehouseid, {QTY : newstock}, function(res){
								if ( res && res.code == 200 ){
								  alert('QTY UPDATED');
								  history.go(0);
								} else if ( res && res.message ){
								  alert('Failed to update field: '+res.message);
								} else {
								  alert('Failed to update field.  Check server log for details');
								}
							});	
						} else {
							alert('NOTE: NOT ENOUGH STOCK TO FUFILL REQUEST.  PLEASE ORDER MORE.....');
						}

					//alert("barcode matches part id.  quantity updated";
				} else {
					alert("Barcode doesn't match product.  Try again.");
					history.go(0);
				}
			} else {
					alert("Part has already been kitted");
					//history.go(0);
			}
			// Stop acting like a button
			e.preventDefault();
	
	
	
	
		
		});
	});


  
})();