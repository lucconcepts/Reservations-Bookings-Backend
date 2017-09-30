<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
include 'config.php';
// Selecting Database
session_start();// Starting Session
// Storing Session
$user_check = $_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql = mysqli_query($connect,'SELECT * FROM usr WHERE uid = "'.$user_check.'"');
$ses_row = mysqli_fetch_assoc($ses_sql);
$login_session = $ses_row['uid'];
if(!isset($login_session)){
mysqli_close($connection); // Closing Connection




echo "<script> window.location = '/index.php'</script>"; 

}
?>
