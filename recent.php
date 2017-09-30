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
<center><h1>Recent Bookings</h1></center>

<table>
  <tr>
  <TH>Booking Date</TH>
  <TH>Type</TH>
  <TH>Last Name</TH>
  <TH>First name</TH>
  <TH>Resort</TH>
  <TH>Unit</TH>
  <TH>Check In</TH>
  <TH>Check Out</TH>
  <TH>Nights</TH>
  <TH>Rate</TH>
  <TH>Total</TH>
  <TH>Status</TH>
  <TH>Res #</TH>
  </tr>
	
	<?php

//Recent Reservation Search

$recentresv = mysqli_query($connect, 'SELECT * FROM reservations LEFT JOIN resorts ON reservations.ResortId = resorts.id LEFT JOIN units ON reservations.UnitTypeId = units.id ORDER BY BookingId DESC LIMIT 20');

while ($row1 = mysqli_fetch_array($recentresv,MYSQLI_ASSOC)){
	  echo "<tr><td>".date('m-d-y', strtotime($row1["BookingDate"]))."<td>".$row1["InventoryType"]."</td><td>".$row1["LastName"]."</td><td>".$row1["FirstName"]." </td><td> ".$row1["ResortId"]." </td><td> ".$row1['UnitType']."</td><td> ".date('m-d-y', strtotime( $row1['CheckIn']))."</td><td> ".date('m-d-y', strtotime( $row1['CheckOut']))."</td><td> ".$row1['Nights']."</td><td> ".$row1['DailyRate']."</td><td> ".$row1['NetTotal']."</td><td> ".$row1['Status']."</td><td> ".$row1['SupplierReservationNumber']."</td></tr>";
  }
	?>
    </table>



</body>
</html>