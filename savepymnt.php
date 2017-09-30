<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RRI BOOKING SYSTEM</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 

<style type="text/css">
body {
	background-color: #58c7e2;
}
label {
    cursor: default;
	font-size:12px;
	
}

</style>

<?php 
session_start();
include 'rriconfigs/config.php';
include 'rriconfigs/session.php';
?>
</head>
<body>


<center>
<table width="99%">
<tr>
<td><center><img src="RRI_Logo_lg.jpeg" width="101" height="49"></center></td><td><center><a href="indexrri.php"><img src="Icons/Actions-go-home-icon.png" width="40" height="40"/><br /> DashBoard</a></center></td><td><center><a href="new_reserv_ta.php"><img src="Icons/Actions-address-book-new-icon.png" width="40" height="40"/> <br />New TA Booking</a></center></td><td><center><a href="search.php"><img src="Icons/Actions-document-preview-icon.png" width="40" height="40"/><br />Booking Search</a></center></td><td><center><a href="reports.php"><img src="Icons/Actions-office-chart-area-stacked-icon.png" width="40" height="40"/><br />Reports</a></center></td><td><center><a href="todo.php"><img src="Icons/Actions-document-edit-icon.png" width="40" height="40"/><br />To Do</a></center></td><td><center><?php echo date("m-d-Y h:ia"); ?> EST</center></td>
</tr>
</table>
</center>
  <?php
$BookingId = $_POST['BookingId'];
$payment = $_POST['payment'];
$balance = $_POST['newbal'];
$processed = $_POST['processed'];

function datetojd($date)
{
    return gregoriantojd(idate('m', $date),
                         idate('d', $date),
                         idate('Y', $date));
}

$transdate = date("Y-m-d");


//We put Customer all this into tables
$sqlcust = 'INSERT INTO `ledger` (
`TransactionDate`,
`BookingId`,
`PaymentAmount`,
`Balance`,
`Processed`
)

VALUES ("'.$transdate.'" , "'.$BookingId.'" , "'.$payment.'" , "'.$balance.'" , "'.$processed.'");';

mysqli_query($connect,$sqlcust);

	
$sqlr = 'UPDATE reservations SET Balance = '.$balance.' WHERE BookingId = '.$BookingId.'';
mysqli_query($connect,$sqlr);

	
	

?>
<p><center><H2> Payment Information Saved</H2></center></p>
<p><center><H2><a href="BookingDetail.php?BookingId=<?php echo $BookingId;?>"><img src="Icons/Actions-go-home-icon.png" width="40" height="40"/><br /> Return To Booking # <?php echo $BookingId;?></a></H2></center></p>
</body>
</html>
