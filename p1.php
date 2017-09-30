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

<style>
body {
	background-color: #58c7e2;
}
label {
    cursor: default;
	font-size:12px;
	
}
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: center;
    padding: 0px;
	border: 1px solid black;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>



</head>

<body text="#000000" link="#000000" vlink="#000000" alink="#000000">

<form method="post" action="p2.php">
Enter your key: <input type="text" name="key">
<input type="text" name="id" hidden="hidden" value="<?php echo $_GET['id']; ?>">
<br>
<br>
<input type="submit" name="submit" Value="Go" />



</body>