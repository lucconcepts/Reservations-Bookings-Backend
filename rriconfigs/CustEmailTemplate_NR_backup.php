<?php
$cemailtemp = "
<!DOCTYPE html>
<html>
<body>
<table width='100%'>
<tr>
<td bgcolor='#288395'>
</td>
</tr>
</table>

<table>
  <tr>
    <td><p><img src='RRI_Logo_lg.jpeg' width='200' height='100'  alt=''/></p>
    <p></p>
    </td>
    <td align='right'>
      <p align='left'>Property Questions? Call Resort at ".$row25['Phone']."<br>
Reservation Questions? Call RRI at 1-800-455-9605<br>
Email RRI: 
<a href='mailto:reservations@rrirentals.com?subject=Reservation Question ".$resvnum."'>reservations@rrirentals.com</a>
</p>
      </td>
      </table>
	  <br>
	  <br>
      <table>
      <tr>
       <td>
      <p><strong>Dear ".$row25['FirstName']." ".$row25['LastName']."</strong>,<br>Thank you for your booking at the ".$row25['ResortName'].". Below are your reservation details. Please print this e-mail in case you need to present it upon check-in. Upon your arrival, please go to the front desk to check-in. Have your ID, credit card, and confirmation with you. 

It is important to us that you enjoy your stay, so please do not hesitate to ask for assistance. The front desk will be able to assist you during your stay with any questions, concerns, or requests. If the resort front desk is unable to help you, please call us at 1-800-455-9605 or reply to this email. Have a great stay!</p></td>
      
      </tr>
      </table>
	  <br>
      <table width='100%'>
    <tr>
    <td bgcolor='#288395'>
    <strong><font color='#FFFFFF'>Property Name</font></strong>
     </td>
     <td bgcolor='#288395'>
     </td>
    
  </tr>
  
  <tr>
    <td width='30%'><p align='left'>".$row25['ResortName']."<br>
      ".$row25['Address']."<br>
      ".$row25['City'].", ".$row25['State']." ".$row25['Zip']."<br>
      ".$row25['Phone']."<br>
      ".$row25['Website']."</p>
      </tr>
<tr>
<td>
<br>
</td>
</tr>
    <td width='30%' bgcolor='#288395'>
      <strong><font color='#FFFFFF'> Reservation Information: </font></strong></td>
    <td width='70%' bgcolor='#288395'>
      </td>

    <tr>
    <td>Your Booking ID #:</td>
    <td>".$row25['BookingId']." </td>
    </tr>
    <tr>
    <td>Unit Type:</td>
    <td>".$row25['UnitDescription']."</td>
    </tr>
    <tr>
    <td>Check In Date:
    </td>
    <td>".$CheckIn."</td>
    </tr>
    <tr>
    <td>Check Out Date:</td>
    <td>".$CheckOut."</td>
    </tr>
    <tr>
    <td>Nights:</td>
    <td>".$row25['Nights']."</td>
    </tr>
    <tr>
    <td>Maximum Occupancy:</td>
    <td>".$row25['MaxOcc']."</td>
    </tr>
   
<tr>
<td>
<br>
</td>
</tr>
    <tr>
    <td bgcolor='#288395'><Strong><font color='#FFFFFF' >Resort Policies:</font></Strong></td>
	<td bgcolor='#288395'></td>
    </tr>
    </table>
    <table>
    <tr>
	<td> Check In Time: ".$row25['CheckInTime']."</td>
	</tr>
	<tr><td> Check Out Time: ".$row25['CheckOutTime']."</td></tr>
	<tr><td> Front Desk Hours: ".$row25['FrontDeskHours']."</td></tr>
	<tr>
    <td>".$row25['ResortPolicy']."<br><br><br></td>
  </tr>
</table>
<table width='100%'>
<tr>
<td bgcolor='#288395'>
</td>
</tr>
</table>
";


?>

