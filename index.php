<?php
session_start();

?>

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

<style type="text/css">
body {
	background:url(Icons/bk.jpg) repeat-x;
	
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
	background-image: 	url(../Icons/Actions-dialog-ok-apply-icon2.png);
	background-repeat:	no-repeat;
	background-color:	transparent;
	height:			40px;
	width:			40px;
	border:			none;
	text-indent:		-999em;
}
fieldset 
{
	background-color:#D6D6D6;
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
 table.center {
    margin-left:auto; 
    margin-right:auto;
  }
  
 legend { 
    padding-top: 20px;
    
    border: none;
} 
</style>

</head>
<body text="#000000" link="#000000" vlink="#000000" alink="#000000">



<center>
<table width="99%">
<tr>
<td><center><img src="RRI_Logo_lg.jpeg" width="101" height="49"></center></td>
</table>
</center>

<?php

include 'rriconfigs/config.php';
include 'rriconfigs/uncr.php';


if (isset($_POST['submit']))
{
function datetojd($date)
{
    return gregoriantojd(idate('m', $date),
                         idate('d', $date),
                         idate('Y', $date));
}




$uname = $_POST["uname"];
$pname = $_POST["pname"];

$logcheck = mysqli_query($connect,'SELECT * FROM usr WHERE uid = "'.$uname.'"');

$row2 = mysqli_fetch_assoc($logcheck);
$data = encrypt_decrypt('decrypt', $row2["pid"], $row2["pdd"], $pname);


if ($pname == $data[0]){
	
	
		$_SESSION['login_user'] = $uname;
		
	if ($row2['a'] == "99") {
echo "<script>
window.location = '/indexrri.php';
</script>";

    }
	else {

       echo " <script>
window.location = '/indexusr.php';
</script>";
        
	}
	
	
}

else {
	echo "<center><h2>Login Failed Try Again </h2></center>";
	session_start();
	session_unset(); 
	session_destroy();
	?>
	<center>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <fieldset>
    <legend>User Info</legend>
    <p>
        <label class="field">User Name:</label>
        <input type="text" name="uname" required="required" size="20" value=""> </p>
      <p>
        <label class="field">User Password:</label>
        <input type="text" name="pname" required="required" size="20" value=""> </p>
     
      </fieldset>
    
      
   <center>
 <input type="submit" class="fsSubmitButton" name="submit"  border="0" /><br />Login</center>
 

</form>
</center>
<?php	
}
mysqli_close($connect);
?>



<?php
}else{
	session_start();
	session_unset(); 
	session_destroy();
?>





<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<center>
    <fieldset>
    <legend>User Info</legend>
    <p>
        <label class="field">User Name:</label>
        <input type="text" name="uname" required="required" size="20" value=""> </p>
      <p>
        <label class="field">User Password:</label>
        <input type="text" name="pname" required="required" size="20" value=""> </p>
     
      </fieldset>
      
   <center>
 <input type="submit" class="fsSubmitButton" name="submit"  border="0" /><br />Login</center>
  

</form>


<center>

<?php
}
?>

</body>
</html>
