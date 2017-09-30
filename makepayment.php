<?
include 'rriconfigs/session.php';
date_default_timezone_set("America/New_York");
include 'rriconfigs/config.php';
include 'rriconfigs/uncr.php';

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
fieldset 
{
	width: 500px;
}
label.field
{
text-align: right;
width: 200px;
float: left;
font-weight: bold;
font-family: Arial,Helvetica,sans-serif;
font-size: 1em;	
}
fieldset p 
{
clear: both;
padding: 5px;	
}
</style>


</head>

<body text="#000000" link="#000000" vlink="#000000" alink="#000000">
<?php
$BookingId = $_GET['BookingId'];
$query = ('SELECT * FROM reservations WHERE BookingID = '.$BookingId.'');  
 $result = mysqli_query($connect,$query);
 $row = mysqli_fetch_assoc($result);

 

?>



  <center>
   <fieldset>
    <legend>Booking Info</legend>
    <p><label class="field">Customer Name:</label>
      <input type="text" name="custname" readonly value="<?php echo $row['FirstName'] . " " . $row['LastName']; ?>" />
      </p>
      <p><label class="field">Phone Number:</label>
      <input type="text" name="Pnum" readonly value="<?php echo $row['Phone']; ?>" />
      </p>
<p><label class="field">Balance Due Date:</label>
      <input type="date" name="BalanceDueDate" readonly id="balduedate" value="<?php echo date('m-d-Y', strtotime($row['BalanceDueDate'])); ?>" />
      </p>
      <p>
      <label class="field">Balance Due:</label>
      <input type="text" name="balance" readonly id="balance" value="<?php echo $row['Balance']; ?>" />
      </p>
      </fieldset>
      <p>
      <fieldset>
    <legend>Recent Payment Transactions:</legend>
      
      <br />
      <table  border="1px">
  <tr>
  <TH align="center">Payment Date</TH>
  <TH align="center">Amount</TH>
  <TH align="center">Remaining Balance</TH>
  
  </tr>
  <?php

//Recent Payments Search

$recentpymnt = mysqli_query($connect,'SELECT * FROM ledger WHERE BookingId = "'.$BookingId.'"');

while ($row1 = mysqli_fetch_array($recentpymnt)){
	  echo "<tr><td>".date('m-d-Y', strtotime($row1["TransactionDate"]))."<td>$".$row1["PaymentAmount"]."</td><td>$".$row1["Balance"]." </td></tr>";
  }
	?>
    </table>
    </fieldset>  
      
  <fieldset>
    <legend>Take Payment:</legend>
  <form method="post" name="info" action="savepymnt.php">
  <p>
  <label class="field">Booking Id:</label>
  <input type="text" readonly name="BookingId" required size="20" value="<?php echo $BookingId; ?>">
  </p>
  <label class="field">Current Amount Due:</label>
  <input type="number" step="0.01" readonly name="balance" id="balance" required size="20" value="<?php echo $row['Balance']; ?>">
 <p> 
  <label class="field">Payment Amount:</label>
  <input type="number" step="0.01" required name="payment" id="payment"  onblur="balcalc()"/>
  </p>
  <p>
  <label class="field">Balance Remaining After This Payment:</label>
  <input type="number" step="0.01" required name="newbal" id="newbal" />
  <p><label class="field">Payment Processed?:</label>
      <select name="processed">
      <option value="NO">NO</option>
      <option value="YES">YES</option>
      
      </select>
      </p>
  <p>
  <input type="submit" name="submit" Value="Record Payment" />
  </form>
  </p>
  </fieldset>
  
  </center>

