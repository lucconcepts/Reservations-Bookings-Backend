<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
<style>
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
<?
date_default_timezone_set("America/New_York");
include 'rriconfigs/config.php';

include 'rriconfigs/session.php';
?>

</head>

<body>

  
<center>
  <h1>Todo List For User</h1> </center>

<table>
  <tr>
  <TH>Due Date</TH>
  <TH>Task Name</TH>
  <TH>Task Notes</TH>
  
  </tr>
	
	 <?php

//Recent Reservation Search
$usr1 = $_SESSION['login_user'];

$nosupv = mysqli_query($connect,'SELECT * FROM todo WHERE AssignUser = "'.$usr1.'" AND CompleteDate = "0000-00-00" ORDER BY DueDate ASC');

while ($row2 = mysqli_fetch_array($nosupv)){
	 echo "<tr><td>".date('m-d-Y', strtotime( $row2["DueDate"]))."</td><td>".$row2["TaskName"]." </td><td>".$row2["TaskNotes"]."</td></tr>";
	 }
	?>
    </table>
  


</body>
</html>