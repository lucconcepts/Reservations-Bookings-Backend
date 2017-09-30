<?
date_default_timezone_set("America/New_York");
include 'rriconfigs/config.php';
include 'rriconfigs/sessionc.php';

//If Session user = chris then allow this page, if session user = someone else fail back to indexrri


//This is Page 1 - Must enter the hash to decode the credit card numbers?

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
<script>
function balcalc() {
var balance1 = document.getElementById('balance').value;
var pymnt = document.getElementById('payment').value;
var newbal = balance1 - pymnt;
document.getElementById('newbal').value= newbal;
	
	
}

</script> 
<style>
body {
	background-color: #58c7e2;
}
label {
    cursor: default;
	font-size:12px;
	
}
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: center;
    padding: 0px;
	border: 1px solid black;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>



</head>

<body text="#000000" link="#000000" vlink="#000000" alink="#000000">
<?php
if (isset($_POST['submit']))
{
$rowCount = count($_POST["id"]);

for($i=0;$i<$rowCount;$i++) {
	
	if($_POST["processed"][$i] == 'on'){
mysqli_query($connect,"UPDATE ledger SET Processed='YES' WHERE id='" . $_POST["id"][$i] . "'");
	}

	if($_POST["delete"][$i] == 'on'){
		$ccnum = substr($_POST["ccnum"][$i], -4);
		$ccnum2 = substr($_POST["ccnum"][$i], -17, 1);
		$ccnum3 = $ccnum2 . $ccnum;
	mysqli_query($connect,"UPDATE reservations SET ccnum='".$ccnum3."', expdate='' WHERE BookingId='" . $_POST["BookingId"][$i] . "'");

	
	}

else {
}

}
?>
<script>
window.location = "notprocessed.php";
</script>
<?php


}
