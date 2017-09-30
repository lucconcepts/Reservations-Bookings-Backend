<?php 
session_start();
include 'rriconfigs/config.php';
include 'rriconfigs/session.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RRI BOOKING SYSTEM</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="dist/bootstrap.min.css" type="text/css" media="all">
<link href="jsb/jquery.bootgrid.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
<script src="jsb/jquery-1.11.1.min.js"></script>
<script src="jsb/bootstrap.min.js"></script>
<script src="jsb/jquery.bootgrid.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.css" />

<style type="text/css">
body {
	background-color: #58c7e2;
}
label {
    cursor: default;
	font-size:12px;
	
}

</style>


</head>
<?php
$usr_check = $_SESSION['login_user'];
$usr_sql = mysqli_query($connect,'SELECT * FROM usr WHERE uid="'.$usr_check.'"');
$task_row = mysqli_fetch_assoc($usr_sql);
$lvl_check = $task_row['a'];

if($lvl_check != '99'){
 $query1 = ('SELECT * FROM todo WHERE AssignUser = "'.$usr_check.'" ORDER BY DueDate ASC');  
 $result1 = mysqli_query($connect,$query1);  
}
else {
	$query1 = ('SELECT * FROM todo ORDER BY DueDate ASC');  
 $result1 = mysqli_query($connect,$query1);  
}
?>


<body text="#000000" link="#000000" vlink="#000000" alink="#000000">  

<center>
<table width="99%">
<tr>
<td><center><img src="RRI_Logo_lg.jpeg" width="101" height="49"></center></td><td><center><a href="indexrri.php"><img src="Icons/Actions-go-home-icon.png" width="40" height="40"/><br /> DashBoard</a></center></td><td><center>
</center></td><td><center></center></td><td><center><a href="createtask.php"><img src="Icons/add-event-icon.png" width="40" height="40"/><br />Create Task</a></center></td><td><center></center></td><td><center><?php echo date("m-d-Y h:ia"); ?> EST</center></td>
</tr>
</table>
           <br /><br />  
           <div class="container">  
               
              <br />  
                <div class="table-responsive">  
                    
                     <table id="reservation" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
                                    <th data-column-id="TaskId">Task ID</th>  
                                    <th data-column-id="CreateUser">Created By</th>  
                                    <th data-column-id="AssignUser">Assigned To</th>
                                    <th data-column-id="DueDate">Due Date</th>
                                    <th data-column-id="TaskNmae">Task Name</th>
                                    <th data-column-id="TaskNotes">Task Details</th>
                                  
                                      
                               </tr>  
                          </thead>  
                          <tbody>  
                          
                          <?php  
                          while($rowtask = mysqli_fetch_assoc($result1))  
                          {  
                               echo '  
                               <tr>  
                                <td></td>    
									<td>'.$rowtask["id"].'</td>  
                                    <td>'.$rowtask["CreateUser"].'</td>  
                                    <td>'.$rowtask["AssignUser"].'</td>
									    <td>'.date('m-d-Y', strtotime( $rowtask['DueDate'] )).'</td>
										<td>'.$rowtask["TaskName"].'</td>
										<td>'.$rowtask["TaskNotes"].'</td>
									      
                               </tr>  
                               ';  
                          }  
                          ?>  
                          </tbody>  
                     </table>  
                     
                </div>  
           </div>  
      </body>  



</html>
<script>  
 $("#reservation").bootgrid(
 {
    url: "/api/data/basic",
    selection: true,
    multiSelect: true,
    formatters: {
        "commands": function(column, row)
        {
            return "<a href=\"edittask.php?taskid=" + row.TaskId +  "\">" + "Edit Task" + "</a> ";
			
        }
    }
 });
 
 </script> 