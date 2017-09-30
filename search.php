<?php 
include 'rriconfigs/session.php';
include 'rriconfigs/config.php';

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
 $query = ('SELECT * FROM reservations ORDER BY BookingID DESC');  
 $result = mysqli_query($connect,$query);  




?>


<body>  
           <br /><br />  
           <div class="container">  
               
              <br />  
                <div class="table-responsive">  
                    
                     <table id="reservation" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
                                    <th data-column-id="BookingId">Booking ID</th>  
                                    <th data-column-id="FirstName">First Name</th>  
                                    <th data-column-id="LastName">Last Name</th>
                                    <th data-column-id="Email">Email</th>
                                    <th data-column-id="Phone">Phone</th>
                                    <th data-column-id="CheckIn">Check In</th>
                                    <th data-column-id="ResortId">Resort Id</th>
                                      
                               </tr>  
                          </thead>  
                          <tbody>  
                          
                          <?php  
                          while($row = mysqli_fetch_assoc($result))  
                          {  
                               echo '  
                               <tr>  
                                <td></td>    
									<td>'.$row["BookingId"].'</td>  
                                    <td>'.$row["FirstName"].'</td>  
                                    <td>'.$row["LastName"].'</td>
									    <td>'.$row["Email"].'</td>
										<td>'.$row["Phone"].'</td>
										<td>'.date('m-d-Y', strtotime( $row['CheckIn'] )).'</td>
										<td>'.$row["ResortId"].'</td>
									      
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
            return "<a href=\"BookingDetail.php?BookingId=" + row.BookingId +  "\">" + "Edit Booking" + "</a> | <a href=\"makepayment.php?BookingId=" + row.BookingId +  "\">" + "Take Payment" + "</a> | <a href=\"generateemail.php?BookingId=" + row.BookingId +  "\">" + "Generate Email" + "</a>";
			
        }
    }
 });
 
 </script> 