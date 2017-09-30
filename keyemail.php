<?php

//Ask chris about alternate emails that do not have HTML, like plain text, how we will want them to look to include the alt email in this 
include 'rriconfigs/session.php';
require_once 'lib/swift_required.php';


$ctemp = "<!DOCTYPE html>
<html>
<body>
<p><strong>Dear Chris, Booking ID # ".$row25['BookingId']." was booked with the key of ".$key.".
</body>
</html>
";	
$ip = $_SERVER['REMOTE_ADDR'];
	$hname = $_SERVER['REMOTE_HOST'];
	 
	// Create the mail transport configuration
	$transport = Swift_SmtpTransport::newInstance('HOSTNAME', 465, 'ssl')
	->setUsername('USRNAME')
	->setPassword('PWD')
	;
	$mailer = Swift_Mailer::newInstance($transport);

//Define emails first for easy use in the if statements later
//customer email

$messagerri = Swift_Message::newInstance();
$messagerri->setTo(array(
	  "EMAILADDR" => "NAME"
	  
	));
	

	$messagerri->setFrom("FROMEMAILADDR", "DISPLAYNAME");
$messagerri->setSubject("Booking ID ".$row25['BookingId']."");
	$messagerri->setBody($ctemp, "text/html");

	$mailer->send($messagerri);
	
	
?>