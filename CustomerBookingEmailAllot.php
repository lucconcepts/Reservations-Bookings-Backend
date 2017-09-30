<?php
session_start();
	
include 'rriconfigs/config.php';
include 'rriconfigs/session.php';
$resvnum = $_GET['BookingId'];

?>
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

<SCRIPT LANGUAGE="JavaScript">
function CopyToClipboard(containerid) {
if (document.selection) { 
    var range = document.body.createTextRange();
    range.moveToElementText(document.getElementById(containerid));
    range.select().createTextRange();
    document.execCommand("Copy"); 

} else if (window.getSelection) {
    var range = document.createRange();
     range.selectNode(document.getElementById(containerid));
     window.getSelection().addRange(range);
     document.execCommand("Copy");
     alert("text copied") 
}}

</SCRIPT>
</head>

<?php


//Lets start by fetching all the data on the reservation, customer and resort we might need
$bravo2 = ('SELECT * FROM reservations LEFT JOIN allotment ON reservations.ResortId = allotment.id WHERE BookingId = "'.$resvnum.'"');
$delta2 = mysqli_query($connect,$bravo2);
$row25 = mysqli_fetch_assoc($delta2);


$CheckIn = date('m-d-Y', strtotime( $row25['CheckIn'] ));
$CheckOut = date('m-d-Y', strtotime( $row25['CheckOut'] ));
$BalanceDueDate = date('m-d-Y', strtotime( $row25['BalanceDueDate'] ));
include 'rriconfigs/CustEmailTemplate_Allot.php';
?>

<P>

<center>
<table width="99%">
<tr>
<td><center>
<img src="Icons/Status-mail-unread-new-icon.png" width="40" height="40"/></center><br />
<br /><a href="mailto:<?php echo $row25['Email']; ?>?subject=RRI Booking ID#<?php echo $resvnum; ?>"><center><button id="button1" onclick="CopyToClipboard('div1')">Launch Customer Booking Email</button></a></center>

<div id="div1"><?php echo $cemailtemp; ?></div></td>


</tr>
</table>
</center>




<?php


//Don't need this anymore - we combined the customer and reservation tables
//$bravo3 = ('SELECT * FROM reservations LEFT JOIN customers ON reservations.custid = customers.custid WHERE resvnum = "'.$resvnum.'"');
//$delta3 = mysql_query($bravo3);
//$row30 = mysql_fetch_assoc($delta3);

///////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////
//How are we going todo emails now so they launch into an Outlook window?



 // remove all session variables
unset($_SESSION['supe']);
unset($_SESSION['custe']);
unset($_SESSION['resvnum']);
unset($_SESSION['custid']);

?>

