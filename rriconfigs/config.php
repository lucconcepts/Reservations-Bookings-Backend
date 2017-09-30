<?php
//Database Configs
//$host = 'localhost';
//$UID = 'mjsuite3_rri';
//$PWD = 'rri954';
//$database = 'mjsuite3_RRI';
//$conn = mysql_connect($host, $UID, $PWD) or die(mysql_error());

//mysql_select_db($database, $conn) or die(mysql_error());
date_default_timezone_set("America/New_York");
	$host_name  = "localhost";
    $database   = "DB";
    $user_name  = "USR";
    $password   = "PWD";


    $connect = mysqli_connect($host_name, $user_name, $password, $database);
   // mysqli_select_db($connect, $database);
	
    if(mysqli_connect_errno())
    {
    echo '<p>Failed to connect to MySQL: '.mysqli_connect_error().'</p>';
    }
    else
    {
    
    }
	
	
?>