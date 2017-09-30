<!doctype html>
<html>
<head>
<base target="_parent">
<meta charset="UTF-8">
<title></title>
<style>
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
<?
date_default_timezone_set("America/New_York");
include 'rriconfigs/config.php';
include 'rriconfigs/session.php';

?>

</head>

<body>
<center><h1>Reservation With Balance Due</h1></center>

<table>
  <tr>
  <TH>First Name</TH>
  <TH>Last Name</TH>
  <TH>Booking ID</TH>
  <TH>Balance Due Date</TH>
  <TH>Balance Remaining</TH>
  </tr>
	
	 <?php

//Recent Reservation Search


$nosupv = mysqli_query($connect,'SELECT * FROM reservations WHERE Balance>0 ORDER BY BalanceDueDate ASC LIMIT 20 ');

while ($row2 = mysqli_fetch_array($nosupv)){
	  echo "<tr><td><a href='/makepayment.php?BookingId=".$row2["BookingId"]."'>".$row2["FirstName"]." </a></td><td>".$row2["LastName"]." </td><td> ".$row2["BookingId"]." </td><td> ".date('m-d-Y', strtotime( $row2["BalanceDueDate"]))."</td><td> ".$row2["Balance"]."</td></tr>";
  }
	?>
    </table>



</body>
</html>