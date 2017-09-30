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
}
a:link {
	color: #000000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000000;
}
a:hover {
	text-decoration: none;
	color: #000000;
}
a:active {
	text-decoration: none;
	color: #000000;
}
</style>
<?
date_default_timezone_set("America/New_York");
include 'rriconfigs/config.php';
include 'rriconfigs/sessionc.php';
?>


</head>

<body>
<center><h1>Booking Payments Not Processed</h1></center>

<table>
  <tr>
  <TH>First Name</TH>
  <TH>Last Name</TH>
  <TH>Booking ID</TH>
  <TH>Transaction Date</TH>
  <TH>Amount</TH>
  </tr>
	
	 <?php

//Recent Reservation Search


$nosupv = mysqli_query($connect,'SELECT * FROM ledger LEFT JOIN reservations ON ledger.BookingId = reservations.BookingId WHERE Processed <>"YES" ORDER BY TransactionDate ASC');

while ($row2 = mysqli_fetch_assoc($nosupv)){
	  echo "<tr><td><a href='/p1.php?id=".$row2["BookingId"]."'>".$row2["FirstName"]." </a></td><td>".$row2["LastName"]." </td><td> ".$row2["BookingId"]." </td><td> ".date('m-d-Y', strtotime( $row2['TransactionDate'] ))."</td><td> ".$row2["PaymentAmount"]."</td></tr>";
  }
	?>
    </table>



</body>
</html>