
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
<td><center><img src="RRI_Logo_lg.jpeg" width="101" height="49"></center></td><td><center><a href="indexrri.php"><img src="Icons/Actions-go-home-icon.png" width="40" height="40"/><br /> DashBoard</a></center></td><td><center>
</center></td><td><center><a href="search.php"><img src="Icons/Actions-document-preview-icon.png" width="40" height="40"/><br />Booking Search</a></center></td><td><center></center></td><td><center><a href="todo.php"><img src="Icons/Actions-document-edit-icon.png" width="40" height="40"/><br />To Do</a></center></td><td><center><?php echo date("m-d-Y h:ia"); ?> EST</center></td>
</tr>

<tr>
<td><center></center></td><td><center><a href="new_reserv_ta.php"><img src="Icons/Actions-address-book-new-icon.png" width="40" height="40"/> <br />New TA Booking</a></center></td><td><center><a href="new_reserv_nr.php"><img src="Icons/hotel-finder-icon.png" width="40" height="40"/> <br />
New NetRate Booking</a>
</center></td><td><center><a href="searchallotment.php"><img src="Icons/resort-icon.png" width="40" height="40"/> <br />
New Allotment Booking</a>
</center></td><td><center>
</center></td><td><center></center></td><td><center></center></td>
</tr>
</table>
</center>

<?php

include 'rriconfigs/config.php';

include 'rriconfigs/session.php';

if (isset($_POST['submit'])){
$complete = $_POST['complete'];

if ($complete === "value1"){
	 $CompleteDate = date("Y-m-d");
}

	
$taskid = $_POST["taskid"];	
$AssignUser = $_POST["AssignUser"];
$DueDate = $_POST["DueDate"];
$TaskName = $_POST["TaskName"];
$TaskNotes = $_POST["TaskNotes"];
$CreateDate = date("Y-m-d");
$CreateUser = $_SESSION['login_user'];

$DueDate3 = date('Y-m-d', strtotime($DueDate));


//We put all this into tables


$sqlcust = ('UPDATE todo SET AssignUser = "'.$AssignUser.'", DueDate = "'.$DueDate3.'", TaskName = "'.$TaskName.'", TaskNotes = "'.$TaskNotes.'", CompleteDate = "'.$CompleteDate.'" WHERE id = "'.$taskid.'";');

mysqli_query($connect,$sqlcust);
	
	



?>

<p><center><H2> Task Saved</H2></center></p>

<?
}else {
$usersql = mysqli_query($connect,'SELECT * FROM usr');

$taskid = $_GET['taskid'];



//We put all this into tables


$sqlcust = ('SELECT * FROM todo WHERE id = "'.$taskid.'";');

$sqlTask = mysqli_query($connect,$sqlcust);
$result11 = mysqli_fetch_assoc($sqlTask);


?>

<center>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <fieldset>
    <legend>Task Info</legend>
    <input type="text" name="taskid" hidden="hidden" required="required" value="<?php echo $taskid; ?>"/>
       <p><label class="field">Assigned To User:</label>
        <select name="AssignUser" >
        <?php echo '<option value="'.$result11['AssignUser'].'">'.$result11['AssignUser'].'</option> ';

    while($user1 = mysqli_fetch_assoc($usersql)){
		echo '<option value="'.$user1['uid'].'">'.$user1['uid'].'</option> ';

    } ?>
</select> </p>
     
         <p><label class="field">Due Date:</label>
      <input type="text" name="DueDate" required="required" id="from" value="<?php echo date('m-d-Y', strtotime($result11['DueDate'])); ?>"/>
      </p>
    <p><label class="field">Task Name:</label>
        <input type="text" name="TaskName" size="25" value="<?php echo $result11['TaskName']; ?>"> </p>
        
      <p><label class="field">Task Details:</label>
        <textarea name="TaskNotes" size="75" value="<?php echo $result11['TaskNotes']; ?>"> <?php echo $result11['TaskNotes']; ?> </textarea></p>
      <p><label class="field">Task Complete?:</label>
        <input type="checkbox" name="complete" value="value1"></p>
      <p><center>
      <input type="submit" class="fsSubmitButton" name="submit"  border="0" /><br />Save Task</center>
      </p>
      <p><center>
      <a href="indexrri.php"><img src="Icons/Actions-dialog-close-icon.png" width="40" height="40"/> <br />Cancel</a>
      </center></p>
      
      </fieldset>



</form>

</center>








<?php
}
mysqli_close($connect);
?>



</body>
</html>
