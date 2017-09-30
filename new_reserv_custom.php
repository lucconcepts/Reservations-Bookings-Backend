
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
		 $("#taxrate").val(ui.item.tx);
		  
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
          numberOfMonths: 3,
		   altField: "#balduedate"
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
	background:url(Icons/bk.jpg) repeat-x;
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
	background-color: #D6D6D6;
	width: 425px;
	
}
label.field
{
text-align: left;
width: 200px;
float: left;
padding: 1px;

font-family: Arial,Helvetica,sans-serif;
font-size: 1em;	
}
fieldset p 
{
	background-color:#D6D6D6;
clear: both;
padding: 0px;	
}
legend { 
    padding-top: 20px;
    
    border: none;
} 

</style>


</head>
<body text="#000000" link="#000000" vlink="#000000" alink="#000000">






<?php

include 'rriconfigs/config.php';
include 'rriconfigs/cr.php';
include 'rriconfigs/session.php';

if (isset($_POST['submit']))
{
function datetojd($date)
{
    return gregoriantojd(idate('m', $date),
                         idate('d', $date),
                         idate('Y', $date));
}



$title = $_POST["title"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$phone = $_POST["phone"];
$phone2 = $_POST["phone2"];
$email = $_POST["email"];
$email2 = $_POST["email2"];
$address = $_POST["address"];
$address2 = $_POST["address2"];
$city = $_POST["city"];
$state = $_POST["state"];
$zip = $_POST["zip"];
$country = $_POST["country"];
$custnotes = $_POST["custnotes"];


$bookdate = date("Y-m-d");

//$emailcust = $_POST["emailcust"];
//$emailsupplier = $_POST["emailsupplier"];
//$agent = $_POST["agent"]; Need to code this to logged in user
//$custid = $_SESSION['custid'];
//Do we use these?
//$netrate = $_POST["netrate"];
//$netrateprofit = $_POST["netrateprofit"];

$source = $_POST["source"];
$resort = $_POST["resortid"];
$unittype = $_POST["unittype"];
$invtype = $_POST["invtype"];
$woname = $_POST["woname"];
$checkin = $_POST["checkin"];
$checkout = $_POST["checkout"];
$nights = $_POST["nights"];
$dailyrate = $_POST["dailyrate"];
$netrate = $_POST["netrate"];
$nettotal = $_POST["nettotal"];
$totalrate = $_POST["totalrate"];
$deposit = $_POST["deposit"];
$balance = $_POST["balance"];
$paytype = $_POST["paytype"];
$depositamt = $_POST["depositamt"];
$cctype = $_POST["cctype"];
$ccnum2 = $_POST["ccnum"];
$expdate = $_POST["expdate"];
$balto = $_POST["balto"];

$status = $_POST["status"];
$supresvnum = $_POST["supresvnum"];
$guestreq = $_POST["guestreq"];
$resvnote = $_POST["resvnote"];
$processed = $_POST["processed"];

$data = encrypt_decrypt('encrypt', $ccnum2);
$ccnum = $data[0];
$iv = $data[1];
$key = $data[2];

$balduedate = $_POST["checkin"];
$balduedate2 = date('Y-m-d', strtotime($balduedate));
if($balto === "RRI"){
	
	$balduedate2 = date('Y-m-d', strtotime("-30 days",strtotime($balduedate)));

}

$checkin3 = date('Y-m-d', strtotime($checkin));
$checkout3 = date('Y-m-d', strtotime($checkout));





$checkin1 = strtotime($checkin);
$checkout2 = strtotime($checkout);
$bookdate2 = strtotime($bookdate);
//$nights = datetojd($checkout2) - datetojd($checkin1);
//We put all this into tables
//We put Customer all this into tables

$sqlcust = 'INSERT INTO `reservations` (
`Title`,
`FirstName`,
`LastName`,
`Phone`,
`Phone2`,
`Email`,
`Email2`,
`Address`,
`Address2`,
`City`,
`State`,
`Zip`,
`Country`,
`CustomerNotes`,
`BookingDate`,
`BookingAgent`,
`Source`,
`ResortId`,
`UnitTypeId`,
`InventoryType`,
`WOName`,
`CheckIn`,
`CheckOut`,
`Nights`,
`DailyRate`,
`NetTotal`,
`TotalRate`,
`NetRate`,
`NetRateProfit`,
`PayType`,
`DepositAmount`,
`Balance`,
`cctype`,
`ccnum`,
`expdate`,
`BalanceTo`,
`BalanceDueDate`,
`Status`,
`SupplierReservationNumber`,
`GuestRequests`,
`ReservationNotes`
)

VALUES ("'.$title.'" , "'.$fname.'" , "'.$lname.'" , "'.$phone.'" , "'.$phone2.'" , "'.$email.'" , "'.$email2.'" , "'.$address.'" , "'.$address2.'" , "'.$city.'" , "'.$state.'" , "'.$zip.'" , "'.$country.'" , "'.$custnotes.'" , "'.$bookdate.'" , "'.$agent.'" , "'.$source.'" , "'.$resort.'" , "'.$unittype.'" , "'.$invtype.'" , "'.$woname.'" , "'.$checkin3.'" , "'.$checkout3.'" , "'.$nights.'" , "'.$dailyrate.'" , "'.$nettotal.'" , "'.$totalrate.'" , "'.$netrate.'" , "'.$netrrateprofit.'" , "'.$paytype.'" , "'.$deposit.'" , "'.$balance.'" , "'.$cctype.'" , "'.$ccnum.'" , "'.$expdate.'" , "'.$balto.'" , "'.$balduedate2.'" , "'.$status.'" , "'.$supresvnum.'" , "'.$guestreq.'" , "'.$resvnote.'");';

mysqli_query($connect,$sqlcust);

    echo mysqli_connect_errno();




	
$bravo2 = ('SELECT * FROM reservations ORDER BY BookingId DESC LIMIT 1');
$delta2 = mysqli_query($connect,$bravo2);
$row25 = mysqli_fetch_assoc($delta2);
$cid2 = $row25['BookingId'];
session_start();
$_SESSION['resvnum'] = $cid2;

include 'keyemail.php';

// Send amount of $ plus deposit transaction to ledger	
$sqlledger = 'INSERT INTO `ledger` (
`BookingId`,
`PaymentAmount`,
`Balance`,
`TransactionDate`,
`Processed`
)

VALUES ("'.$row25['BookingId'].'" , "'.$deposit.'" , "'.$balance.'", "'.$bookdate.'", "'.$processed.'");';

mysqli_query($connect,$sqlledger);
	echo mysqli_connect_errno();	

mysqli_close($connect);
?>
<script>
window.location = '/email_cust_nr.php'
</script>
<?
//STOPPED HERE WORKING ON EMAIL STUFFFFF////////////////////////////
///////////////////////////
/////////////////////////

?>
<center>
<table>
<tr><td><a href="indexrri.php">Dashboard</a></td><td><a href="new_reserv.php">New Reservation</a></td><td><center><a href="search.php">Search</a></td><td><a href="reports.php">Reports</a></td><td><a href="todo.php">To Do</a></td>
</tr>
</table>
</center>
<p><center><H2> Reservation Saved - No Emails Sent</H2></center></p>











<?php
}else{
?>





<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" autocomplete="off">
<table width="100%" border="0">
<tr><td>

      
      </td>
      <td>
        
      </td>
          
    </tr>
  
  <tr>
    <td>
  <fieldset>
  <legend class="field"> Customer Information</legend>
    
<p><label class="field" for="source">Source Of Business:</label>
       <select name="source">
      <option value=""></option>
      <option value="HA">HA</option>
      <option value="Flip">Flip</option>
      <option value="AB">AB</option>
      <option value="Refer">Refer</option>
      <option value="Repeat">Repeat</option>
      <option value="Web">Web</option>
      <option value="Newspaper">Newspaper</option>
      </select>
      </p>
      <p><label class="field" for="title">Title:</label>
        <select name="title">
        <option value =""></option>
        <option value="Mr">Mr</option>
        <option value="Mrs">Mrs</option>
        <option value="Ms">Ms</option>
        </select> </p>
      <p><label class="field" for="fname">First Name:</label>
        <input type="text" name="fname" required="required" size="25" value=""> </p>
      <p><label class="field">Last Name:</label>
        <input type="text" name="lname" required="required" size="25" value=""> </p>
        <p><label class="field">Phone Number:</label>
        <input type="text" name="phone" size="25" value=""> </p>
        <p>
        <label class="field"> Phone Number 2:</label>
        <input type="text" name="phone2" size="25" value=""> </p>
    <p><label class="field">Email Address:</label>
        <input type="text" name="email" size="25" value=""> </p>
        <p>
        <label class="field"> Email Address 2:</label>
        <input type="text" name="email2" size="25" value=""> </p>
       
    
        
    <p><label class="field">Address:</label>
        <input type="text" name="address" size="25" value=""> </p>
      <p><label class="field">Second Address:</label>
        <input type="text" name="address2" size="25" value=""> </p>        
        <p><label class="field">City:</label>
        <input type="text" name="city" size="25" value=""> </p>
        <p><label class="field">State:</label>
<select name"state" size="">
<option value="Alabama">Alabama</option>
	<option value="Alaska">Alaska</option>
	<option value="Arizona">Arizona</option>
	<option value="Arkansas">Arkansas</option>
	<option value="California">California</option>
	<option value="Colorado">Colorado</option>
	<option value="Connecticut">Connecticut</option>
	<option value="Delaware">Delaware</option>
	<option value="District-Of-Columbia">District Of Columbia</option>
	<option value="Florida">Florida</option>
	<option value="Georgia">Georgia</option>
	<option value="Hawaii">Hawaii</option>
	<option value="Idaho">Idaho</option>
	<option value="Illinois">Illinois</option>
	<option value="Indiana">Indiana</option>
	<option value="Iowa">Iowa</option>
	<option value="Kansas">Kansas</option>
	<option value="Kentucky">Kentucky</option>
	<option value="Louisiana">Louisiana</option>
	<option value="Maine">Maine</option>
	<option value="Maryland">Maryland</option>
	<option value="Massachusetts">Massachusetts</option>
	<option value="Michigan">Michigan</option>
	<option value="Minnesota">Minnesota</option>
	<option value="Mississippi">Mississippi</option>
	<option value="Missouri">Missouri</option>
	<option value="Montana">Montana</option>
	<option value="Nebraska">Nebraska</option>
	<option value="Nevada">Nevada</option>
	<option value="New-Hampshire">New Hampshire</option>
	<option value="New-Jersey">New Jersey</option>
	<option value="New-Mexico">New Mexico</option>
	<option value="New-York">New York</option>
	<option value="North-Carolina">North Carolina</option>
	<option value="North-Dakota">North Dakota</option>
	<option value="Ohio">Ohio</option>
	<option value="Oklahoma">Oklahoma</option>
	<option value="Oregon">Oregon</option>
	<option value="Pennsylvania">Pennsylvania</option>
	<option value="Rhode-Island">Rhode Island</option>
	<option value="South-Carolina">South Carolina</option>
	<option value="South-Dakota">South Dakota</option>
	<option value="Tennessee">Tennessee</option>
	<option value="Texas">Texas</option>
	<option value="Utah">Utah</option>
	<option value="Vermont">Vermont</option>
	<option value="Virginia">Virginia</option>
	<option value="Washington">Washington</option>
	<option value="West Virginia">West Virginia</option>
	<option value="Wisconsin">Wisconsin</option>
	<option value="Wyoming">Wyoming</option>
    </select>
        </p>
        <p><label class="field">Zip:</label>
        <input type="text" name="zip" size="10" value=""> </p>
        <p><label class="field">Country:</label>
        <select name="country">
          <option value="United States">United States</option>
          <option value="Canada">Canada</option>
          <option value="Afghanistan">Afghanistan</option>
          <option value="Albania">Albania</option>
          <option value="Algeria">Algeria</option>
          <option value="American Samoa">American Samoa</option>
          <option value="Andorra">Andorra</option>
          <option value="Angola">Angola</option>
          <option value="Anguilla">Anguilla</option>
          <option value="Antartica">Antarctica</option>
          <option value="Antigua and Barbuda">Antigua and Barbuda</option>
          <option value="Argentina">Argentina</option>
          <option value="Armenia">Armenia</option>
          <option value="Aruba">Aruba</option>
          <option value="Australia">Australia</option>
          <option value="Austria">Austria</option>
          <option value="Azerbaijan">Azerbaijan</option>
          <option value="Bahamas">Bahamas</option>
          <option value="Bahrain">Bahrain</option>
          <option value="Bangladesh">Bangladesh</option>
          <option value="Barbados">Barbados</option>
          <option value="Belarus">Belarus</option>
          <option value="Belgium">Belgium</option>
          <option value="Belize">Belize</option>
          <option value="Benin">Benin</option>
          <option value="Bermuda">Bermuda</option>
          <option value="Bhutan">Bhutan</option>
          <option value="Bolivia">Bolivia</option>
          
          <option value="Botswana">Botswana</option>
          <option value="Bouvet Island">Bouvet Island</option>
          <option value="Brazil">Brazil</option>
          
          <option value="Brunei Darussalam">Brunei Darussalam</option>
          <option value="Bulgaria">Bulgaria</option>
          <option value="Burkina Faso">Burkina Faso</option>
          <option value="Burundi">Burundi</option>
          <option value="Cambodia">Cambodia</option>
          <option value="Cameroon">Cameroon</option>
          <option value="Canada">Canada</option>
          <option value="Cape Verde">Cape Verde</option>
          <option value="Cayman Islands">Cayman Islands</option>
          <option value="Central African Republic">Central African Republic</option>
          <option value="Chad">Chad</option>
          <option value="Chile">Chile</option>
          <option value="China">China</option>
          <option value="Christmas Island">Christmas Island</option>
          <option value="Cocos Islands">Cocos (Keeling) Islands</option>
          <option value="Colombia">Colombia</option>
          <option value="Comoros">Comoros</option>
          <option value="Congo">Congo</option>
          
          <option value="Cook Islands">Cook Islands</option>
          <option value="Costa Rica">Costa Rica</option>
          <option value="Cota D'Ivoire">Cote d'Ivoire</option>
          <option value="Croatia">Croatia (Hrvatska)</option>
          <option value="Cuba">Cuba</option>
          <option value="Cyprus">Cyprus</option>
          <option value="Czech Republic">Czech Republic</option>
          <option value="Denmark">Denmark</option>
          <option value="Djibouti">Djibouti</option>
          <option value="Dominica">Dominica</option>
          <option value="Dominican Republic">Dominican Republic</option>
          <option value="East Timor">East Timor</option>
          <option value="Ecuador">Ecuador</option>
          <option value="Egypt">Egypt</option>
          <option value="El Salvador">El Salvador</option>
          <option value="Equatorial Guinea">Equatorial Guinea</option>
          <option value="Eritrea">Eritrea</option>
          <option value="Estonia">Estonia</option>
          <option value="Ethiopia">Ethiopia</option>
        
          <option value="Faroe Islands">Faroe Islands</option>
          <option value="Fiji">Fiji</option>
          <option value="Finland">Finland</option>
          <option value="France">France</option>
          <option value="France Metropolitan">France, Metropolitan</option>
          <option value="French Guiana">French Guiana</option>
          <option value="French Polynesia">French Polynesia</option>
          
          <option value="Gabon">Gabon</option>
          <option value="Gambia">Gambia</option>
          <option value="Georgia">Georgia</option>
          <option value="Germany">Germany</option>
          <option value="Ghana">Ghana</option>
          <option value="Gibraltar">Gibraltar</option>
          <option value="Greece">Greece</option>
          <option value="Greenland">Greenland</option>
          <option value="Grenada">Grenada</option>
          <option value="Guadeloupe">Guadeloupe</option>
          <option value="Guam">Guam</option>
          <option value="Guatemala">Guatemala</option>
          <option value="Guinea">Guinea</option>
          <option value="Guinea-Bissau">Guinea-Bissau</option>
          <option value="Guyana">Guyana</option>
          <option value="Haiti">Haiti</option>
        
          <option value="Holy See">Holy See (Vatican City State)</option>
          <option value="Honduras">Honduras</option>
          <option value="Hong Kong">Hong Kong</option>
          <option value="Hungary">Hungary</option>
          <option value="Iceland">Iceland</option>
          <option value="India">India</option>
          <option value="Indonesia">Indonesia</option>
          <option value="Iran">Iran</option>
          <option value="Iraq">Iraq</option>
          <option value="Ireland">Ireland</option>
          <option value="Israel">Israel</option>
          <option value="Italy">Italy</option>
          <option value="Jamaica">Jamaica</option>
          <option value="Japan">Japan</option>
          <option value="Jordan">Jordan</option>
          <option value="Kazakhstan">Kazakhstan</option>
          <option value="Kenya">Kenya</option>
          <option value="Kiribati">Kiribati</option>
          <option value="Korea">Korea</option>
          <option value="Kuwait">Kuwait</option>
          <option value="Kyrgyzstan">Kyrgyzstan</option>
          <option value="Lao">Lao</option>
          <option value="Latvia">Latvia</option>
          <option value="Lebanon">Lebanon</option>
          <option value="Lesotho">Lesotho</option>
          <option value="Liberia">Liberia</option>
        
          <option value="Liechtenstein">Liechtenstein</option>
          <option value="Lithuania">Lithuania</option>
          <option value="Luxembourg">Luxembourg</option>
          <option value="Macau">Macau</option>
         
          <option value="Madagascar">Madagascar</option>
          <option value="Malawi">Malawi</option>
          <option value="Malaysia">Malaysia</option>
          <option value="Maldives">Maldives</option>
          <option value="Mali">Mali</option>
          <option value="Malta">Malta</option>
          <option value="Marshall Islands">Marshall Islands</option>
          <option value="Martinique">Martinique</option>
          <option value="Mauritania">Mauritania</option>
          <option value="Mauritius">Mauritius</option>
          <option value="Mayotte">Mayotte</option>
          <option value="Mexico">Mexico</option>
         
          <option value="Moldova">Moldova, Republic of</option>
          <option value="Monaco">Monaco</option>
          <option value="Mongolia">Mongolia</option>
          <option value="Montserrat">Montserrat</option>
          <option value="Morocco">Morocco</option>
          <option value="Mozambique">Mozambique</option>
          <option value="Myanmar">Myanmar</option>
          <option value="Namibia">Namibia</option>
          <option value="Nauru">Nauru</option>
          <option value="Nepal">Nepal</option>
          <option value="Netherlands">Netherlands</option>
          <option value="Netherlands Antilles">Netherlands Antilles</option>
          <option value="New Caledonia">New Caledonia</option>
          <option value="New Zealand">New Zealand</option>
          <option value="Nicaragua">Nicaragua</option>
          <option value="Niger">Niger</option>
          <option value="Nigeria">Nigeria</option>
          <option value="Niue">Niue</option>
          <option value="Norfolk Island">Norfolk Island</option>
         
          <option value="Norway">Norway</option>
          <option value="Oman">Oman</option>
          <option value="Pakistan">Pakistan</option>
          <option value="Palau">Palau</option>
          <option value="Panama">Panama</option>
          <option value="Papua New Guinea">Papua New Guinea</option>
          <option value="Paraguay">Paraguay</option>
          <option value="Peru">Peru</option>
          <option value="Philippines">Philippines</option>
          <option value="Pitcairn">Pitcairn</option>
          <option value="Poland">Poland</option>
          <option value="Portugal">Portugal</option>
          <option value="Puerto Rico">Puerto Rico</option>
          <option value="Qatar">Qatar</option>
          <option value="Reunion">Reunion</option>
          <option value="Romania">Romania</option>
          <option value="Russia">Russian Federation</option>
          <option value="Rwanda">Rwanda</option>
          <option value="Saint Kitts and Nevis">Saint Kitts</option>
          <option value="Saint LUCIA">Saint LUCIA</option>
          <option value="Saint Vincent">Saint Vincent</option>
          <option value="Samoa">Samoa</option>
          <option value="San Marino">San Marino</option>
          <option value="Sao Tome and Principe">Sao Tome and Principe</option>
          <option value="Saudi Arabia">Saudi Arabia</option>
          <option value="Senegal">Senegal</option>
          <option value="Seychelles">Seychelles</option>
          <option value="Sierra">Sierra Leone</option>
          <option value="Singapore">Singapore</option>
          <option value="Slovakia">Slovakia (Slovak Republic)</option>
          <option value="Slovenia">Slovenia</option>
          <option value="Solomon Islands">Solomon Islands</option>
          <option value="Somalia">Somalia</option>
          <option value="South Africa">South Africa</option>
          
          <option value="Span">Spain</option>
          <option value="SriLanka">Sri Lanka</option>
          <option value="St. Helena">St. Helena</option>
          <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
          <option value="Sudan">Sudan</option>
          <option value="Suriname">Suriname</option>
          <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
          <option value="Swaziland">Swaziland</option>
          <option value="Sweden">Sweden</option>
          <option value="Switzerland">Switzerland</option>
          <option value="Syria">Syrian Arab Republic</option>
          <option value="Taiwan">Taiwan, Province of China</option>
          <option value="Tajikistan">Tajikistan</option>
          <option value="Tanzania">Tanzania, United Republic of</option>
          <option value="Thailand">Thailand</option>
          <option value="Togo">Togo</option>
          <option value="Tokelau">Tokelau</option>
          <option value="Tonga">Tonga</option>
          <option value="Trinidad and Tobago">Trinidad and Tobago</option>
          <option value="Tunisia">Tunisia</option>
          <option value="Turkey">Turkey</option>
          <option value="Turkmenistan">Turkmenistan</option>
          <option value="Turks and Caicos">Turks and Caicos Islands</option>
          <option value="Tuvalu">Tuvalu</option>
          <option value="Uganda">Uganda</option>
          <option value="Ukraine">Ukraine</option>
          <option value="United Arab Emirates">United Arab Emirates</option>
          <option value="United Kingdom">United Kingdom</option>
          <option value="United States">United States</option>
          
          <option value="Uruguay">Uruguay</option>
          <option value="Uzbekistan">Uzbekistan</option>
          <option value="Vanuatu">Vanuatu</option>
          <option value="Venezuela">Venezuela</option>
          <option value="Vietnam">Viet Nam</option>
          <option value="Virgin Islands (British)">Virgin Islands (British)</option>
          <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
          <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
          <option value="Western Sahara">Western Sahara</option>
          <option value="Yemen">Yemen</option>
          <option value="Yugoslavia">Yugoslavia</option>
          <option value="Zambia">Zambia</option>
          <option value="Zimbabwe">Zimbabwe</option>
        </select>
        </p>
        <p><label class="field">Customer Notes:</label>
        <textarea name="custnotes" size="250"></textarea>
        
        
     
</fieldset>
    </td>

    <td>
     <fieldset>
    <legend>Booking Information</legend>
       <p><label class="field">Status:</label>
      <select name="status" required="required">
      <option value="Pending">Pending</option>
      <option value="Confirmed">Confirmed</option>
      <option value="Cancelled">Cancelled</option>
      <option value="Other">Other</option>
      <option value="Waitlist">Waitlist</option>
      </select>
      </p>
      
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
      </div>
      </p>
      
      <input type="text" name="invtype" hidden="" value="NetRate" required="required">

      <p><label class="field">Check In Date:</label>
      <input type="text" name="checkin" required="required" id="from" />
      </p>
      <p><label class="field">Check Out Date:</label>
      <input type="text" name="checkout" required="required" id="to" />
      </p>
      <p>
      
      <input type="text" name="nights" required="required" hidden="hidden" id="nights" />
      </p>
      <p>
      <label class="field">Tax Rate:</label>
      <input type="text" name="taxrate" required="required" id="taxrate" />
      </p>

      
    <p><label class="field">Daily Rate:</label>
      <input type="number" step="0.01" name="dailyrate" id="dailyrate" required="required" value="" onblur="calc()"/>
      </p>
      <p><label class="field">Net Rate: </label>
        <input type="number" step="0.01" name="netrate" required="required" id="netrate" value="" />
      </p>
      <p>
      <label class="field">Pre Tax Total: </label>
        <input type="number" step="0.01" name="nettotal" readonly="readonly" required="required" id="nettotal" value="" />
      </p>
     
      <p>
      <label class="field">Total With Tax: </label>
        <input type="number" step="0.01" id="totalrate" name="totalrate" readonly="readonly" required="required" value="" />
      </p>
      <p><label class="field">Guest Requests:</label>
      <textarea name="guestreq" size="250"></textarea>
      </p>
            <p><label class="field">Reservation Notes:</label>
      <textarea name="resvnote" size="250"></textarea>
      </p>
      
      </fieldset>
      </td>
    <td>
    <fieldset>
     <legend>Payment Information</legend>
      <p><label class="field">Deposit:</label>
        <input type="number" name="deposit" step="0.01" id="deposit" onblur="bal()" required="required" value="" />
      </p>
      
    <p><label class="field">Payment Type:</label>
      <select name="paytype">
      <option value="CC">Credit Card</option>
      <option value="Check">Check</option>
      <option value="PayPal">PayPal</option>
      <option value="HA Payments">HA Payments</option>
      <option value="Flip Payments">Flip Payments</option>
      <option value="AB Payments">AB Payments</option>
      </select>
      </p>
      <p>
      <label class="field">Credit Card Type:</label>
      <select name="cctype">
     <option value="Visa">Visa</option>
     <option value="Amex">Amex</option>
     <option value="Discover">Discover</option>
     <option value="Mastercard">Mastercard</option>
     </select>
      </p>
    <p><label class="field">Credit Card Number:</label>
      <input type="text" id="1" name="ccnum" onblur="validatecreditcard();"/><br />
      <label id="validate3"></label>
      </p>
      
      <p><label class="field">Expiration Date (MMYY):</label>
      <input type="text" name="expdate" value=""/>
      </p>
      <p><label class="field">Payment Processed:</label>
      <select name="processed">
      <option value="NO">NO</option>
      <option value="YES">YES</option>
    
      </select>
      </p>
      
      
    
    <p><label class="field">Balance:</label>
      <input type="number" name="balance" step="0.01" id="balance" readonly="readonly" value="" />
      </p>
      
      <p><label class="field">Balance To:</label>
      <select name="balto" required="required">
      <option value="RRI">RRI</option>
      <option value="Resort">Resort</option>
      </select>
      </p>
      
      <p><label class="field">Balance Due Date:</label>
      <input type="text" id="balduedate" name="balduedate" value="" />
      </p>
  
      <p><label class="field">Supplier Reservation Number:</label>
      <input type="text" name="supresvnum" value="" />
      </p>
      
      <p>
     <center>
 <input type="submit" class="fsSubmitButton" name="submit"  border="0" /><br />Save Booking</center>
   </p>
   <p>
   <center><a href="indexrri.php"><img src="Icons/Actions-dialog-close-icon.png" width="40" height="40"/> <br />Cancel</a></center></p>
    </fieldset>
    
    
    
    </td>
    </tr>
   

</table>


</form>




<?php
}
?>

</body>
</html>
