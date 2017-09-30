
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>RRI BOOKING SYSTEM</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
 
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>
  
<script>
function calc() {
	var nightsto = document.getElementById('nights').value;
	var dailyrate = document.getElementById('dailyrate').value;
	var txrate = document.getElementById('taxrate').value;
	var nettotal = nightsto * dailyrate;
	var trate1 = (dailyrate * txrate).toFixed(2) * nightsto;

	document.getElementById('nettotal').value= nettotal;
	document.getElementById('totalrate').value= trate1;
	
}

function bal() {
var deposit = document.getElementById('deposit').value;
var tot = document.getElementById('totalrate').value;
var bdue = tot - deposit;
document.getElementById('balance').value= bdue;
	
	
}

</script> 

<script>
function units(){
var rid = document.getElementById('resortid').value;
var mylink = "searchunit.php?t=" + rid;
  var items="";
  $.getJSON(mylink,function(data){

    $.each(data,function(index,item) 
    {
      items+="<option value='"+item.id+"'>"+item.value+"</option>";
    });
    $("#unittype").html(items); 
  });

};
</script>  
 

<script>
$(function() {
$("#skills").autocomplete({
    source: 'searchresort.php',
    select: function(event, ui) { 
        $("#resortid").val(ui.item.id);
		 
		 
		  
    }
	});
	
});
</script>


<script>

function validatecreditcard() {

var request;

try {

request= new XMLHttpRequest();

}

catch (tryMicrosoft) {

try {

request= new ActiveXObject("Msxml2.XMLHTTP");
}

catch (otherMicrosoft) 
{
try {
request= new ActiveXObject("Microsoft.XMLHTTP");
}

catch (failed) {
request= null;
}
}
}



var url= "cardvalidation.php";
var cardnumber= document.getElementById("1").value;
var vars= "creditcardnumber="+cardnumber;
request.open("POST", url, true);

request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

request.onreadystatechange= function() {
if (request.readyState == 4 && request.status == 200) {
	var return_data=  request.responseText;
	document.getElementById("validate3").innerHTML= return_data;
}
}

request.send(vars);
}
</script>
  
  
  
 
  <script>
  $( function() {
    var dateFormat = "mm/dd/yy",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 3
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
		 
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
		var start = $("#from").datepicker("getDate");
        var end = $("#to").datepicker("getDate");
        var days = (end - start) / (1000 * 60 * 60 * 24);
        $("#nights").val(days);
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
	  
    }

  } );
 
  </script>
  
    <script>
  $( function() {
    $( "#balduedate" ).datepicker();
  } );
  </script>
  
  

<style type="text/css">
body {
	background-color: #53D5F9;
	font-family: Arial,Helvetica,sans-serif;
font-size: 1em;
}
input {
	font-family: Arial,Helvetica,sans-serif;
font-size: 1em;
}
select {
	font-family: Arial,Helvetica,sans-serif;
font-size: 1em;
}
label {
    cursor: default;
	font-size:12px;
	
}

tabs { 
    padding: 0px; 
    background: #58c7e2; 
    border-width: 0px; 
} 
tabs .ui-tabs-nav { 
    padding-left: 0px; 
    background: transparent; 
    border-width: 0px 0px 1px 0px; 
    -moz-border-radius: 0px; 
    -webkit-border-radius: 0px; 
    border-radius: 0px; 
} 
tabs-1 .ui-tabs-panel { 
    background: #f5f3e5 url(http://code.jquery.com/ui/1.8.23/themes/south-street/images/ui-bg_highlight-hard_100_f5f3e5_1x100.png) repeat-x scroll 50% top; 
    border-width: 0px 1px 1px 1px; 
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
.fsSubmitButton
{
	background-image: 	url(Icons/Actions-dialog-ok-apply-icon2.png);
	background-repeat:	no-repeat;
	background-color:	transparent;
	height:			40px;
	width:			40px;
	border:			none;
	text-indent:		-999em;
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

<?php

include 'rriconfigs/config.php';

include 'rriconfigs/sessionc.php';


if (isset($_POST['submit']))
{
function datetojd($date)
{
    return gregoriantojd(idate('m', $date),
                         idate('d', $date),
                         idate('Y', $date));
}




$fname = $_POST["fname"];
$lname = $_POST["lname"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$ownerpaid = $_POST["ownerpaid"];
$supplierreservationnumber = $_POST["supplierreservationnumber"];


$resortid = $_POST["resortid"];
$unittype = $_POST["unittype"];
$unitnumber = $_POST["unitnumber"];

$checkin = $_POST["checkin"];
$checkout = $_POST["checkout"];
$nights = $_POST["nights"];
$netrate = $_POST["netrate"];

$available = $_POST["available"];


$checkin3 = date('Y-m-d', strtotime($checkin));
$checkout3 = date('Y-m-d', strtotime($checkout));

//We put all this into tables


$sqlcust = 'INSERT INTO `allotment` (
`OwnerFirstName`,
`OwnerLastName`,
`OwnerPhone`,
`OwnerEmail`,
`ResortId`,
`UnitId`,
`UnitNumber`,
`CheckInDate`,
`CheckOutDate`,
`Nights`,
`NetRate`,
`Available`,
`PaidOwner`,
`SupplierReservationNumber`
)

VALUES ("'.$fname.'" , "'.$lname.'" , "'.$phone.'" , "'.$email.'" , "'.$resortid.'" , "'.$unittype.'" , "'.$unitnumber.'" , "'.$checkin3.'" , "'.$checkout3.'" , "'.$nights.'" , "'.$netrate.'" , "'.$available.'" , "'.$ownerpaid.'" , "'.$supplierreservationnumber.'");';

mysqli_query($connect,$sqlcust);

    echo mysqli_connect_errno();

mysqli_close($connect);
?>


<?
//STOPPED HERE WORKING ON EMAIL STUFFFFF////////////////////////////
///////////////////////////
/////////////////////////

?>

<p><center><H2> Allotment Saved</H2></center></p>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table width="100%" border="0">
<tr>
    <td>
    <fieldset>
    <legend>Owner Info</legend>
      <p><label class="field">Owner First Name:</label>
        <input type="text" name="fname" required="required" size="20" value=""> </p>
      <p><label class="field">Owner Last Name:</label>
        <input type="text" name="lname" required="required" size="20" value=""> </p>
        <p><label class="field">Owner Phone Number:</label>
        <input type="text" name="phone" size="20" value=""> </p>
    <p><label class="field">Owner Email Address:</label>
        <input type="text" name="email" size="25" value=""> </p>
        
        <p><label class="field">Owner Paid?:</label>
      <select name="ownerpaid">
      <option value="NO">NO</option>
      <option value="YES">YES</option>
    
      </select>
      </p>
      <p><label class="field">Available?:</label>
      <select name="available">
      <option value="YES">YES</option>
      <option value="NO">NO</option>
    
      </select>
      </p>
      <p><label class="field">Supplier Reservation Number:</label>
        <input type="text" name="supplierreservationnumber" size="25" value=""> </p>
      </fieldset>
       </td>
        
    <td>
    <fieldset>
    <legend>Allotment Details</legend>
<p>
      <div class="ui-widget">
   <label class="field">Resort:</label>
    <input type="text" name="resort" id="skills" required="required" onblur="units()"/>
      </div>
      <input type="text" name="resortid" hidden="" id="resortid" required="required"/>
      </p>
      <div class="ui-widget">
      <p><label class="field">Unit Type:</label>
      <select name="unittype" id="unittype" required="required" value="" />
      </select>
      </div>
      </p>
      
      <p><label class="field">Unit Number:</label>
      <input type="text" name="unitnumber" required="required"/>
      </p>

      <p><label class="field">Check In Date:</label>
      <input type="text" name="checkin" required="required" id="from" />
      </p>
      <p><label class="field">Check Out Date:</label>
      <input type="text" name="checkout" required="required" id="to" />
      </p>
      <p>
      
      <input type="text" name="nights" hidden="hidden" required="required" id="nights" />
      </p>
      
      
    <p><label class="field">Net Rate:</label>
        <input type="number" step="0.01" name="netrate" required="required" id="netrate" value="" />
      </p>
      </fieldset>
      </td>
    
    </tr>
    <tr>
      <td>
   <center>
 <input type="submit" class="fsSubmitButton" name="submit"  border="0" /><br />Save Booking</center>
   </td>
   <td>
<center><a href="indexrri.php"><img src="Icons/Actions-dialog-close-icon.png" width="40" height="40"/> <br />Cancel</a></center>
</td>
      
    </tr>

</table>


</form>










<?php
}else{
?>





<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table width="100%" border="0">
<tr>
    <td>
    <fieldset>
    <legend>Owner Info</legend>
      <p><label class="field">Owner First Name:</label>
        <input type="text" name="fname" required="required" size="20" value=""> </p>
      <p><label class="field">Owner Last Name:</label>
        <input type="text" name="lname" required="required" size="20" value=""> </p>
        <p><label class="field">Owner Phone Number:</label>
        <input type="text" name="phone" size="20" value=""> </p>
    <p><label class="field">Owner Email Address:</label>
        <input type="text" name="email" size="25" value=""> </p>
        
        <p><label class="field">Owner Paid?:</label>
      <select name="ownerpaid">
      <option value="NO">NO</option>
      <option value="YES">YES</option>
    
      </select>
      </p>
      <p><label class="field">Available?:</label>
      <select name="available">
      <option value="YES">YES</option>
      <option value="NO">NO</option>
    
      </select>
      </p>
      <p><label class="field">Supplier Reservation Number:</label>
        <input type="text" name="supplierreservationnumber" size="25" value=""> </p>
      </fieldset>
       </td>
        
    <td>
    <fieldset>
    <legend>Allotment Details</legend>
<p>
      <div class="ui-widget">
   <label class="field">Resort:</label>
    <input type="text" name="resort" id="skills" required="required" onblur="units()"/>
      </div>
      <input type="text" name="resortid" hidden="" id="resortid" required="required"/>
      </p>
      <div class="ui-widget">
      <p><label class="field">Unit Type:</label>
      <select name="unittype" id="unittype" required="required" value="" />
      </select>
      </div>
      </p>
      
      <p><label class="field">Unit Number:</label>
      <input type="text" name="unitnumber" required="required"/>
      </p>

      <p><label class="field">Check In Date:</label>
      <input type="text" name="checkin" required="required" id="from" />
      </p>
      <p><label class="field">Check Out Date:</label>
      <input type="text" name="checkout" required="required" id="to" />
      </p>
      <p>
      
      <input type="text" name="nights" hidden="hidden" required="required" id="nights" />
      </p>
      
      
    <p><label class="field">Net Rate:</label>
        <input type="number" step="0.01" name="netrate" required="required" id="netrate" value="" />
      </p>
      </fieldset>
      </td>
    
    </tr>
    <tr>
      <td>
   <center>
 <input type="submit" class="fsSubmitButton" name="submit"  border="0" /><br />Save Booking</center>
   </td>
   <td>
<center><a href="indexrri.php"><img src="Icons/Actions-dialog-close-icon.png" width="40" height="40"/> <br />Cancel</a></center>
</td>
      
    </tr>

</table>


</form>




<?php
}
?>

</body>
</html>
