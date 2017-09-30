<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>RRI BOOKING SYSTEM</title>
<style type="text/css">
body {
	background-color: #53D5F9;
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
</style>
<?
date_default_timezone_set("America/New_York");
include 'rriconfigs/config.php';
include 'rriconfigs/session.php';


?>
</head><body text="#000000" link="#000000" vlink="#000000" alink="#000000">
<center>
<table width="99%">
<tr>
<td><center><img src="RRI_Logo_lg.jpeg" width="101" height="49"></center></td><td><center><a href="indexrri.php"><img src="Icons/Actions-go-home-icon.png" width="40" height="40"/><br /> DashBoard</a></center></td><td><center>
</center></td><td><center><a href="search.php"><img src="Icons/Actions-document-preview-icon.png" width="40" height="40"/><br />Booking Search</a></center></td><td><center><a href="reports.php"><img src="Icons/Actions-office-chart-area-stacked-icon.png" width="40" height="40"/><br />Reports</a></center></td><td><center><a href="todo.php"><img src="Icons/Actions-document-edit-icon.png" width="40" height="40"/><br />To Do</a></center></td><td><center><?php echo date("m-d-Y h:ia"); ?> EST</center></td>
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
<P>
<center>
<table>
<tr>
<td></td>
</tr>
</table>
</center>
<center>
<iframe height="250" width="600" src="recent.php"></iframe>
<iframe height="250" width="600" src="todolist.php"></iframe>
<P>
<iframe height="250" width="600" src="resbaldue.php"></iframe>
<iframe height="250" width="600" src="noconfirm.php"></iframe>
</center>










<?
mysql_close($conn);
?>