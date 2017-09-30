<?
date_default_timezone_set("America/New_York");
include 'rriconfigs/config.php';
include 'rriconfigs/sessionc.php';
//If Session user = chris then allow this page, if session user = someone else fail back to indexrri


//This is Page 1 - Must enter the hash to decode the credit card numbers?

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

</style>


</head>

<body text="#000000" link="#000000" vlink="#000000" alink="#000000">

  <form method="post" name="info" action="p2.php">
  <p>
  PassCode:
  <input type="text" name="key" required size="20" value="">
  </p>
  <input type="submit" name="submit" Value="Access Records" />
  </form>
  
  
  </div>
  
