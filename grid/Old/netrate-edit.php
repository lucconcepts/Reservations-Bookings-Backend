<?php

// Tables for this example.php see file: 'test.sql'

session_start();
require_once("mte/mte.php");
$tabledit = new MySQLtabledit();



		#####################
		# required settings #
		#####################


# database settings:
$tabledit->database = 'mjsuite3_RRI';
$tabledit->host = 'localhost';
$tabledit->user = 'mjsuite3_rri';
$tabledit->pass = 'rri954';



# table of the database you want to edit:
$tabledit->table = 'nrprop';


# the primary key of the table (must be AUTO_INCREMENT):
$tabledit->primary_key = 'i';


# the fields you want to see in "list view"
# Always add the primary key (`employeeNumber)`: 
$tabledit->fields_in_list_view = array('i','id','ResortName','Phone','Phone2','NewBookingEmail','ReservationManagerEmail','Address','Address2','City','State','Zip','Country','TaxRate','ResortFee','ResortFeeStruct','ArrivalInfo','ResortPolicy','CheckInTime','CheckOutTime','Notes','CommisionRate');



		#####################
		# optional settings #
		#####################


# Head of the page (<h1>head_1<h1>):
$tabledit->head_1 = "";


# language (en=English, de=German, fr=French, nl=Dutch):
$tabledit->language = 'en';


# numbers of rows/records in "list view": 
$tabledit->num_rows_list_view = 10;


# required fields in edit or add record: 
$tabledit->fields_required = array('id','ResortName');


# Fields you want to edit (remove this to edit all the fields).
#$tabledit->fields_to_edit = array('lastName','email','job');


# help texts: 
$tabledit->help_text = array(
	'id' => 'ResortCode',
	'ResortName' => 'Resort Name',
	'Phone' => 'Phone',
	'Phone2' => 'Phone2',
	'NewBookingEmail' => 'New Booking Email',
	'ReservationManagerEmail' => 'Reservation Manager Email',
	'Address' => 'Address',
	'Address2' => 'Address2',
	'City' => 'City',
	'State' => 'State',
	'Zip' => 'Zip',
	'Country' => 'Country',
	'Taxrate' => 'Tax Rate - Enter as 1.xx',
	'ResortFee' => 'Digits only (no $)',
	'ResortFeeStruct' => 'Per Day plus tax, per stay plus tax, or per person plus tax',
	'ArrivalInfo' => 'Instructions upon arrival',
	'ResortPolicy' => 'will show in confirmation exactly as typed here. Use [enter] to have a new line',
	'CheckInTime' => 'use 24 hour format',
	'CheckOutTime' => 'use 24 hour format',
	'Notes' => 'Notes',
	'FrontDeskHours' => 'Will show in confirmation exactly as typed here'
);


$tabledit->show_text = array(
	'id' => 'ResortCode',
	'ResortName' => 'Resort Name',
	'Phone' => 'Phone',
	'Phone2' => 'Phone2',
	'NewBookingEmail' => 'New Booking Email',
	'ReservationManagerEmail' => 'Reservation Manager Email',
	'Address' => 'Address',
	'Address2' => 'Address2',
	'City' => 'City',
	'State' => 'State',
	'Zip' => 'Zip',
	'Country' => 'Country',
	'Taxrate' => 'Tax Rate - Enter as 1.xx',
	'ResortFee' => 'ResortFee',
	'ResortFeeStruct' => 'Resort Fee Structure',
	'ArrivalInfo' => 'Arrival Info',
	'ResortPolicy' => 'Resort Policy',
	'CheckInTime' => 'Check In Time as HH:MM:SS',
	'CheckOutTime' => 'Check Out Time as HH:MM:SS',
	'Notes' => 'Notes',
	'FrontDeskHours' => 'Front Desk Hours'
);


# visible name of the fields in list view: 
$tabledit->show_text_listview = array(
	'id' => 'ResortCode',
	'ResortName' => 'Resort Name',
	'Phone' => 'Phone',
	'Phone2' => 'Phone2',
	'NewBookingEmail' => 'New Booking Email',
	'ReservationManagerEmail' => 'Reservation Manager Email',
	'Address' => 'Address',
	'Address2' => 'Address2',
	'City' => 'City',
	'State' => 'State',
	'Zip' => 'Zip',
	'Country' => 'Country',
	'TaxRate' => 'Tax Rate - Enter as 1.xx',
	'ResortFee' => 'ResortFee',
	'ResortFeeStruct' => 'Resort Fee Structure',
	'ArrivalInfo' => 'Arrival Info',
	'ResortPolicy' => 'Resort Policy',
	'CheckInTime' => 'Check In Time',
	'Check Out Time' => 'Check Out Time',
	'Notes' => 'Notes',
	'FrontDeskHours' => 'Front Desk Hours'
);



# Make selectlist on inputfield based on another table
# in this example: `employees`.`job` is based on `jobs`.`jobname`: 
#$tabledit->lookup_table = array(
#	'job' => array(
#		'query' => "SELECT `id`, `jobname` FROM `jobs`;",
#		'option_value' => 'id',
#		'option_text' => 'jobname'
#	)
#);


$tabledit->width_editor = '100%';
$tabledit->width_input_fields = '500px';
$tabledit->width_text_fields = '498px';
$tabledit->height_text_fields = '200px';


# warning no .htaccess ('on' or 'off'): 
$tabledit->no_htaccess_warning = 'on';



		####################################
		# connect, show editor, disconnect #
		####################################


$tabledit->database_connect();

echo "<!DOCTYPE html>
<html lang='en'>
<head>

	<meta charset='utf-8'>

	<title>MySQL table edit</title>
	</head>
	<body>
";

$tabledit->do_it();

echo "
	</body>
	</html>"
;

$tabledit->database_disconnect();
?>
