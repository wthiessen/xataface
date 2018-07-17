

//Used in supplierreq form to add qty and select qty text after partnumber is updated.



function updateqty() {

		//var x = document.activeElement.id;
		//var res = x.split("_");
		//$(this).index();
		//formid = "qty_Parts_" + res[2];
		alert($(this).index());
		document.getElementById(formid).select();
		document.getElementById(formid).value=1;
		
}
function testtest()	{
		
			alert($(this).index());
		
}
function printDiv() {
    var DocumentContainer = document.getElementById('invc');
    var WindowObject = window.open('', 'PrintWindow', 'width=750,height=650,top=50,left=50,toolbars=no,scrollbars=yes,status=no,resizable=yes');
    var strHtml = "<html>\n<head>\n <link rel=\"stylesheet\" type=\"text/css\" href=\"test.css\">\n</head><body><div style=\"testStyle\">\n" + DocumentContainer.innerHTML + "\n</div>\n</body>\n</html>";
    WindowObject.document.writeln(strHtml);
    WindowObject.document.close();
    WindowObject.focus();
    WindowObject.print();
    WindowObject.close();

}

function removestock() {
	window.open("index.php?-table=nav_inv&-action=remove", '_blank','toolbar=no,scrollbars=yes,resizable=no,top=100,left=100,width=900,height=600'); return false;
	document.getElementsByNames("-search").focus();
}

function addstock() {
	window.open("index.php?-table=nav_inv&-action=add", '_blank','toolbar=no,scrollbars=yes,resizable=no,top=100,left=100,width=900,height=600'); return false;
	document.getElementsByNames("-search").focus();
}

function warehouse_req(field) {
	window.open("index.php?-table=inventory_parts&-action=new&partid="+field+"", '_blank','toolbar=no,scrollbars=yes,resizable=no,top=100,left=100,width=900,height=600'); return false;
	//document.getElementsByNames("-search").focus();
}

function closeWin() {
    _blank.close();   // Closes the new window
}

function appendText() {
		
    var txt1 = "<tr><td><input type=\"text\" name=\"barcode\" onchange=\"showUser(this.value)\"></td><td><div id=\"txtHint1\"></div></td><td><div id=\"txtHint2\"></div></td><td><div id=\"txtHint3\"></div></td></tr>div id=\"txtHint4\"></div>";              // Create text with HTML
	$("body").append(txt1);     // Append new elements

}
n = 0;
function showUser(str) {
	n++;
	document.getElementById("barcode[]").id = "barcode["+n+"]";
	document.getElementById("txtHint1[]").id = "txtHint1["+n+"]";
	document.getElementById("txtHint2[]").id = "txtHint2["+n+"]";
	document.getElementById("txtHint3[]").id = "txtHint2["+n+"]";
		
	//
    if (str == "") {
		

        document.getElementById("txtHint1["+n+"]").innerHTML = "";
		document.getElementById("txtHint2["+n+"]").innerHTML = "";
		document.getElementById("txtHint3["+n+"]").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {
				var myObj = JSON.parse(this.responseText);
                document.getElementById("txtHint1["+n+"]").innerHTML = myObj.a;
				document.getElementById("txtHint2["+n+"]").innerHTML = myObj.b;
				document.getElementById("txtHint3["+n+"]").innerHTML = myObj.c;
            }
        };
        xmlhttp.open("GET","tables/nav_inv/getuser.php?q="+str,true);
        xmlhttp.send();
    }

	//generate next row of values to be filled in
	var txt1 = "<tr><td><input type=\"text\" name=\"barcode[]\" onchange=\"showUser(this.value)\"></td><td><div id=\"txtHint1[]\"></div></td><td><div id=\"txtHint2[]\"></div></td>	<td><div id=\"txtHint3[]\"></div></td></tr>div id=\"txtHint4[]\"></div>";              // Create text with HTML
	$("body").append(txt1);     // Append new elements
		
	
	
}

