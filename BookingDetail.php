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
body {
	background-color: #58c7e2;
}
label {
    cursor: default;
	font-size:12px;
	
}

</style>
<style type="text/css">

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
.fsSubmitButton
{
	background-image: 	url(Icons/Actions-document-save-icon2.png);
	background-size:contain;
	background-repeat:	no-repeat;
	background-color:	transparent;
	height:			40px;
	width:			40px;
	border:			none;
	text-indent:		-999em;
}
</style>


</head>

<body text="#000000" link="#000000" vlink="#000000" alink="#000000">
<?php
$BookingId = $_GET['BookingId'];
$query = ('SELECT * FROM reservations WHERE BookingID = '.$BookingId.'');  
 $result = mysqli_query($connect,$query);
 $row = mysqli_fetch_assoc($result);
 
$CheckIn = date('m-d-Y', strtotime( $row['CheckIn'] ));
$CheckOut = date('m-d-Y', strtotime( $row['CheckOut'] ));
$BalanceDueDate = date('m-d-Y', strtotime( $row['BalanceDueDate'] ));

if ($row['InventoryType'] == 'TA')
{
 $query2 = ('SELECT * FROM reservations LEFT JOIN resorts ON reservations.ResortId = resorts.id LEFT JOIN units ON reservations.UnitTypeId = units.id WHERE BookingID = '.$BookingId.'');  
 $result2 = mysqli_query($connect,$query2);
 $row2 = mysqli_fetch_assoc($result2);
}

//Need to Code NetRate search
if ($row['InventoryType'] == 'NetRate')
{
 $query2 = ('SELECT * FROM reservations LEFT JOIN resorts ON reservations.ResortId = resorts.id LEFT JOIN units ON reservations.UnitTypeId = units.id WHERE BookingID = '.$BookingId.'');  
 $result2 = mysqli_query($connect,$query2);
 $row2 = mysqli_fetch_assoc($result2);
}

//Need To Code Allotment Search
if ($row['InventoryType'] == 'Allotment')
{
 $query2 = ('SELECT * FROM reservations LEFT JOIN resorts ON reservations.ResortId = resorts.id LEFT JOIN units ON reservations.UnitTypeId = units.id WHERE BookingID = '.$BookingId.'');  
 $result2 = mysqli_query($connect,$query2);
 $row2 = mysqli_fetch_assoc($result2);
}
?>
<center>
<table width="99%">
<tr>
<td><center><img src="RRI_Logo_lg.jpeg" width="101" height="49"></center></td><td><center><a href="indexrri.php"><img src="Icons/Actions-go-home-icon.png" width="40" height="40"/><br /> DashBoard</a></center></td><td><center><a href="settings.php"><img src="Icons/settings-icon.png" width="40" height="40"/> <br />
Settings</a>
</center></td><td><center><a href="search.php"><img src="Icons/Actions-document-preview-icon.png" width="40" height="40"/><br />Booking Search</a></center></td><td><center><a href="reports.php"><img src="Icons/Actions-office-chart-area-stacked-icon.png" width="40" height="40"/><br />Reports</a></center></td><td><center><a href="todo.php"><img src="Icons/Actions-document-edit-icon.png" width="40" height="40"/><br />To Do</a></center></td><td><center><?php echo date("m-d-Y h:ia"); ?> EST</center></td>
</tr>

<tr>
<td><center></center></td><td><center><a href="new_reserv_ta.php"><img src="Icons/Actions-address-book-new-icon.png" width="40" height="40"/> <br />New TA Booking</a></center></td><td><center><a href="new_reserv_nr.php"><img src="Icons/hotel-finder-icon.png" width="40" height="40"/> <br />
New NetRate Booking</a>
</center></td><td><center><a href="searchallotment.php"><img src="Icons/resort-icon.png" width="40" height="40"/> <br />
New Allotment Booking</a>
</center></td><td><center>
</center></td><td><center><a href="createallot.php"><img src="Icons/add-event-icon.png" width="40" height="40"/> <br />
Add New Allotment To System</a></center></td><td><center></center></td>
</tr>
</table>
</center>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">







<table width="100%" border="0">
  <tr>
    <td><div style="font-family: Arial,Helvetica,sans-serif;
font-size: 1em;">
<p>Source Of Business:</div>
      <select name="source">
      <option value="<?php echo $row['Source']?>"><?php echo $row['Source']?></option>
      <option value="HA">HA</option>
      <option value="Flip">Flip</option>
      <option value="AB">AB</option>
      <option value="Refer">Refer</option>
      <option value="Repeat">Repeat</option>
      <option value="Web">Web</option>
      <option value="Newspaper">Newspaper</option>
      </select>
      </p>
      <p><div style="font-family: Arial,Helvetica,sans-serif;
font-size: 1em;">Title:</div>
        <select name="title">
        <option value ="<?php echo $row['Title']?>"><?php echo $row['Title']?></option>
        <option value="Mr">Mr</option>
        <option value="Mrs">Mrs</option>
        <option value="Ms">Ms</option>
        </select> </p>
      <p><div style="font-family: Arial,Helvetica,sans-serif;
font-size: 1em;">First Name:</div>
        <input type="text" name="fname" size="20" value="<?php echo $row['FirstName']?>"> </p>
      <p><div style="font-family: Arial,Helvetica,sans-serif;
font-size: 1em;">Last Name:</div>
        <input type="text" name="lname" size="20" value="<?php echo $row['LastName']?>"> </p>
        <p><div style="font-family: Arial,Helvetica,sans-serif;
font-size: 1em;">Phone Number:</div>
        <input type="text" name="phone" size="20" value="<?php echo $row['Phone']?>"> </p>
        <p><div style="font-family: Arial,Helvetica,sans-serif;
font-size: 1em;">Second Phone Number:</div>
        <input type="text" name="phone2" size="20" value="<?php echo $row['Phone2']?>"> </p>
    <p><div style="font-family: Arial,Helvetica,sans-serif;
font-size: 1em;">Email Address:</div>
        <input type="text" name="email" size="25" value="<?php echo $row['Email']?>"> </p>
        <p><div style="font-family: Arial,Helvetica,sans-serif;
font-size: 1em;">Second Email Address:</div>
        <input type="text" name="email2" size="25" value="<?php echo $row['Email2']?>"> </p>
       
      </td>
        <td>
        <p><div style="font-family: Arial,Helvetica,sans-serif;
font-size: 1em;">Status:</div>
      <select name="status">
      <option value="<?php echo $row['Status']?>"><?php echo $row['Status']?></option>
      <option value="Awaiting Confirmation">Awaiting Confirmation</option>
      <option value="Confirmed">Confirmed</option>
      <option value="Cancelled">Cancelled</option>
      <option value="Other">Other</option>
      <option value="Waitlist">Waitlist</option>
      </select>
      </p>
    <p><div style="font-family: Arial,Helvetica,sans-serif;
font-size: 1em;">Address:</div>
        <input type="text" name="address" size="25" value="<?php echo $row['Address']?>"> </p>
      <p><div style="font-family: Arial,Helvetica,sans-serif;
font-size: 1em;">Second Address:</div>
        <input type="text" name="address2" size="25" value="<?php echo $row['Address2']?>"> </p>        
        <p><div style="font-family: Arial,Helvetica,sans-serif;
font-size: 1em;">City:</div>
        <input type="text" name="city" size="25" value="<?php echo $row['City']?>"> </p>
        <p><div style="font-family: Arial,Helvetica,sans-serif;
font-size: 1em;">State:</div>
        <input type="text" name="state" size="25" value="<?php echo $row['State']?>"> </p>
        <p><div style="font-family: Arial,Helvetica,sans-serif;
font-size: 1em;">Zip:</div>
        <input type="text" name="zip" size="10" value="<?php echo $row['Zip']?>"> </p>
        <p><div style="font-family: Arial,Helvetica,sans-serif;
font-size: 1em;">Country:</div>
        <select name="country">
        <option value="<?php echo $row['Country']?>"><?php echo $row['Country']?></option>
        <option value="US">United States</option>
        <option value="Iraq">Iraq</option>
        </select>
         </p>
        <p><div style="font-family: Arial,Helvetica,sans-serif;
font-size: 1em;">Customer Notes:</div>
        <textarea name="custnotes" size="250"><?php echo $row['CustomerNotes']?></textarea>
        
        
        </td>

    <td>
     
      
      <p>
      <div class="ui-widget">
   Resort:<br />
    <input type="text" name="resort" id="skills" onblur="units()" value="<?php echo $row2['ResortName']?>"/>
      </div>
      <input type="text" name="resortid" hidden="" id="resortid" value="<?php echo $row2['ResortId']?>"/>
      </p>
      <div class="ui-widget">
      <p>Unit Type:<br />
      <select name="unittype" id="unittype" required value="<?php echo $row2['UnitType']?>" />
      </div>
      </p>
      
     

      <p><div style="font-family: Arial,Helvetica,sans-serif;
font-size: 1em;">Check In Date:</div>
      <input type="text" name="checkin" value="<?php echo $row['CheckIn']?>" id="from" />
      </p>
      <p><div style="font-family: Arial,Helvetica,sans-serif;
font-size: 1em;">Check Out Date:</div>
      <input type="text" name="checkout" value="<?php echo $row['CheckOut']?>" id="to" />
      </p>
      <p>
      
      <input type="text" name="nights" required hidden="hidden" id="nights" />
      </p>
      <p>
      <div style="font-family: Arial,Helvetica,sans-serif;
font-size: 1em;">Tax Rate:</div>
      <input type="text" name="taxrate" required id="taxrate" value="<?php echo $row2['TaxRate']?>" />
      </p>

      
    <p><div style="font-family: Arial,Helvetica,sans-serif;
font-size: 1em;">Daily Rate:</div>
      <input type="number" step="0.01" name="dailyrate" id="dailyrate" required value="<?php echo $row['DailyRate']?>" onblur="calc()"/>
      </p>
      <p><div style="font-family: Arial,Helvetica,sans-serif;
font-size: 1em;">Net Total: </div>
        <input type="number" step="0.01" name="nettotal" readonly required id="nettotal" value="<?php echo $row['NetTotal']?>" />
      </p>
     
      <p><div style="font-family: Arial,Helvetica,sans-serif;
font-size: 1em;">Total Rate: </div>
        <input type="number" step="0.01" id="totalrate" name="totalrate" readonly required value="<?php echo $row['TotalRate']?>" />
      </p>
      </td>
    <td>
      <p><div style="font-family: Arial,Helvetica,sans-serif;
font-size: 1em;">Deposit:</div>
        <input type="number" name="deposit" step="0.01" id="deposit" onblur="bal()" required value="<?php echo $row['Deposit']?>" />
      </p>
      
    <p><div style="font-family: Arial,Helvetica,sans-serif;
font-size: 1em;">Payment Type:</div>
      <select name="paytype">
      <option value="<?php echo $row['PayType']?>"><?php echo $row['PayType']?></option>
      <option value="CC">Credit Card</option>
      <option value="Check">Check</option>
      <option value="PayPal">PayPal</option>
      <option value="HA Payments">HA Payments</option>
      <option value="Flip Payments">Flip Payments</option>
      <option value="AB Payments">AB Payments</option>
      </select>
      </p>
      <div style="font-family: Arial,Helvetica,sans-serif;
font-size: 1em;">Credit Card Type:</div>
      <select name="cctype">
      <option value="<?php echo $row['cctype']?>"><?php echo $row['cctype']?></option>
     <option value="Visa">Visa</option>
     <option value="Amex">Amex</option>
     <option value="Discover">Discover</option>
     <option value="Mastercard">Mastercard</option>
     </select>
      </p>
    <p><div style="font-family: Arial,Helvetica,sans-serif;
font-size: 1em;">Credit Card Number:</div>
      <input type="text" id="1" name="ccnum" onblur="validatecreditcard();"/><br />
      <label id="validate3"></label>
      </p>
      
      <p><div style="font-family: Arial,Helvetica,sans-serif;
font-size: 1em;">Expiration Date (MMYY):</div>
      <input type="text" name="expdate" value="<?php echo $row['ExpDate']?>"/>
      </p>
      
      
    
    <p><div style="font-family: Arial,Helvetica,sans-serif;
font-size: 1em;">Balance:</div>
      <input type="number" name="balance" step="0.01" id="balance" readonly value="<?php echo $row['Balance']?>" />
      </p>
      
      <p><div style="font-family: Arial,Helvetica,sans-serif;
font-size: 1em;">Balance To:</div>
      <select name="balto" required>
      <option value="<?php echo $row['BalanceTo']?>"><?php echo $row['BalanceTo']?></option>
      <option value="Resort">Resort</option>
      <option value="RRI">RRI</option>
      </select>
      </p>
      
      <p><div style="font-family: Arial,Helvetica,sans-serif;
font-size: 1em;">Balance Due Date:</div>
      <input type="text" id="balduedate" name="balduedate" value="<?php echo $row['BalanceDueDate']?>" />
      </p>
  
      <p><div style="font-family: Arial,Helvetica,sans-serif;
font-size: 1em;">Supplier Reservation Number:</div>
      <input type="text" name="supresvnum" value="<?php echo $row['SupplierReservationNumber']?>" />
      </p>
    
    
    
    
    </td>
    </tr>
    <tr>
    <td>
      <p><div style="font-family: Arial,Helvetica,sans-serif;
font-size: 1em;">Guest Requests:</div>
      <textarea name="guestreq" size="250"><?php echo $row['GuestRequests']?></textarea>
      </p>
      </td>
      <td>
      <p><div style="font-family: Arial,Helvetica,sans-serif;
font-size: 1em;">Reservation Notes:</div>
      <textarea name="resvnote" size="250"><?php echo $row['ReservationNotes']?></textarea>
      </p>
      </td>
      <td>
   
   </td>
   <td>

</td>
      
    </tr>

</table>


</form>



</body>
</html>