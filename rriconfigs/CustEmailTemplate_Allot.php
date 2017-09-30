<?php
$cemailtemp = "
<!DOCTYPE html>
<html>
<body>
<table>
  <tr>
    <td><p><img src='RRI_Logo_lg.jpeg' width='200' height='100'  alt=''/></p>
    <p></p>
    <p><strong>Property Name:</strong></p>
     </td>
    <td align='right'><p style='font-size: 28px'>Booking ID#: ".$row25['BookingId']."</p>
      
      <p align='left' >&nbsp;</p>
      <p align='left' >&nbsp;</p>
      <p align='left'><strong>Booking Agency:</strong>
     </p>
      </td>
  </tr>
  
  <tr>
    <td width='39%'><p align='left'>".$row25['ResortName']."<br>
      ".$row25['Address']."<br>
      ".$row25['City'].", ".$row25['State']." ".$row25['Zip']."<br>
      ".$row25['Phone']."<br>
      ".$row25['Website']."</p>
      <p><strong>Customer Information:</strong></p></td>
    <td width='61%'><p>Resort Rentals International<br>
407-930-4039<br>
1-800-455-9605<br>
Florida Seller of Travel<br>
License #ST39277</p>
      <p>&nbsp;</p></td>
      </tr>
 
    <td width='50%'><p>Name:</p>
      <p><strong>Reservation Information:</strong></p></td>
    <td width='50%'><p>".$row25['FirstName']." ".$row25['LastName']."</p>
      <p>&nbsp;</p></td>

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
    <td>Nights</td>
    <td>".$row25['Nights']."</td>
    </tr>
    <tr>
    <td>Maximum Occupancy:</td>
    <td>".$row25['MaxOcc']."</td>
    </tr>
    <tr>
    <td>Balance Due</td>
    <td> $".$row25['Balance']." by ".$BalanceDueDate."</td>
    </tr>
    <tr>
    <td>Resort Fee:</td>
    <td>$".$row25['ResortFee']."</td>
    </tr>
    <tr>
    <td><Strong>Resort Policies:</Strong></td>

    <td>".$row25['ResortPolicy']."</td>
  </tr>
</table>";
