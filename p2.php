<?
date_default_timezone_set("America/New_York");
include 'rriconfigs/config.php';
include 'rriconfigs/uncr.php';
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
<!---
<center>
<table width="99%">
<tr>
<td><center><img src="RRI_Logo_lg.jpeg" width="101" height="49"></center></td><td><center><a href="indexrri.php"><img src="Icons/Actions-go-home-icon.png" width="40" height="40"/><br /> DashBoard</a></center></td><td><center><a href="new_reserv_ta.php"><img src="Icons/Actions-address-book-new-icon.png" width="40" height="40"/> <br />New TA Booking</a></center></td><td><center><a href="search.php"><img src="Icons/Actions-document-preview-icon.png" width="40" height="40"/><br />Booking Search</a></center></td><td><center><a href="reports.php"><img src="Icons/Actions-office-chart-area-stacked-icon.png" width="40" height="40"/><br />Reports</a></center></td><td><center><a href="todo.php"><img src="Icons/Actions-document-edit-icon.png" width="40" height="40"/><br />To Do</a></center></td><td><center><?php echo date("m-d-Y h:ia"); ?> EST</center></td>
</tr>
</table>
</center>
!----->
<center><h1>Booking Payments Not Processed</h1></center>
<form method="post" action="p3.php">
<center> <input type="submit" name="submit" Value="Update Pending Payments" /></center>
<table>
  <tr>
  <TH>First Name</TH>
  <TH>Last Name</TH>
  <TH>Booking ID</TH>
  <TH>Transaction Date</TH>
  <TH>Amount</TH>
  <TH>CC Num</TH>
  <TH>Exp Date</TH>
  <TH>Processed?</TH>
  <TH>Delete CC Info?</TH>
  </tr>
	
	 <?php
	 $key = $_POST['key'];
	 $id2 = $_POST['id'];

//Recent Reservation Search


$nosupv = mysqli_query($connect,'SELECT * FROM ledger LEFT JOIN reservations ON ledger.BookingId = reservations.BookingId WHERE ledger.BookingId = '.$id2.' AND Processed <>"YES" ORDER BY TransactionDate ASC');

while ($row2 = mysqli_fetch_assoc($nosupv)){
	$data = encrypt_decrypt('decrypt', $row2["ccnum"], $row2["cci"], $key);
	
	  echo "<tr><td><a href='/editresv.php?BookingId=".$row2["BookingId"]."'>".$row2["FirstName"]." </a></td><td>".$row2["LastName"]." </td><td> ".$row2["BookingId"]." </td><td> ".date('m-d-Y', strtotime( $row2['TransactionDate'] ))."</td><td> ".$row2["PaymentAmount"]."</td><td>".$data[0]."</td><td> ".$row2["expdate"]."</td><td><input type='checkbox' name='processed[]' value='on'/></td><td><input type='checkbox' name='delete[]' value='on'/></td><td><input type='hidden' name='id[]' value='".$row2["id"]."'/><input type='hidden' name='BookingId[]' value='".$row2["BookingId"]."'/><input type='hidden' name='ccnum[]' value='".$data[0]."'></td></td></tr>";
  }
	?>
    </table>

<?php

?>


</form>
</body>
