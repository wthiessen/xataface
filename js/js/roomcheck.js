//require <jquery.packed.js>
//require <xataface/IO.js>
(function(){
  var $ = jQuery;
  DBstring = "parts?PartID=";  


window.onload = function() {
    chk();
};

function chk() 
{
	if ( $("#Room").val() == "ELECTRONICS" ) {
		$("tr#BIN_form_row").attr("hide", true)
	} else {
		$("tr#BIN_form_row").attr("hide", false)
	}
}


  
  
})();