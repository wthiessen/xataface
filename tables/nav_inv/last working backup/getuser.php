<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','sharkmarine');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM nav_inv WHERE ID = '".$q."'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
	echo json_encode(array("a" => $row['Quantity'], "b" => $row['1111XXXXPN'], "c" => $row['Description']));
   
}


mysqli_close($con);
?>
