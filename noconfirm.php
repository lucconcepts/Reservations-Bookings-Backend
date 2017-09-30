<?
date_default_timezone_set("America/New_York");
include 'rriconfigs/config.php';

include 'rriconfigs/session.php';
?>
<!doctype html>
<html>
<head>
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


</head>

<body>

  
<center>
  <h1>Status: Pending</h1> </center>

<table>
  <tr>
  <TH>Last Name</TH>
  <TH>First Name</TH>
  <TH>Resort</TH>
  <TH>Unit</TH>
  <TH>Check In</TH>
  <TH>Check out</TH>
  
  </tr>
	
	 <?php

//Recent Reservation Search


$nosupv = mysqli_query($connect,'SELECT * FROM reservations LEFT JOIN resorts ON reservations.ResortId = resorts.id LEFT JOIN units ON reservations.UnitTypeId = units.id WHERE SupplierReservationNumber = "" ORDER BY BookingId DESC');

while ($row2 = mysqli_fetch_array($nosupv)){
	 echo "<tr><td>".$row2["LastName"]."</td><td>".$row2["FirstName"]." </td><td>".$row2["ResortId"]."</td><td>".$row2["UnitType"]."</td><td>".date('m-d-Y', strtotime( $row2["CheckIn"]))."</td><td>".date('m-d-Y', strtotime( $row2["CheckOut"]))."</td></tr>";
	 }
	?>
    </table>
  


</body>
</html>