
//require <jquery.packed.js>
//require <xataface/IO.js>

function spuh(record) {
	//newrecord = "nav_inv?ID=" + record;
	
	alert(record);
	 $.ajax({
	type: "POST",
	url: "testing.php",
	data: { ID: record }
	})//.done(function( msg ) {
		//alert( "Data Saved: " + msg );
	//});    
}

