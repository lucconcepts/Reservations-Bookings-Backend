<?php 

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
 $query = ('SELECT * FROM allotment LEFT JOIN resorts ON allotment.ResortId = resorts.id LEFT JOIN units on allotment.UnitId = units.id WHERE allotment.Available <> "NO"');  
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
                                    <th data-column-id="AlotId">Id</th>
                                    <th data-column-id="ResortName">Resort Name</th>  
                                    <th data-column-id="UnitType">UnitType</th>                                   <th data-column-id="CheckIn">Check In Date</th>  
                                    <th data-column-id="CheckOut">Check Out Date</th>
                                      
                               </tr>  
                          </thead>  
                          <tbody>  
                          
                          <?php  
                          while($row = mysqli_fetch_assoc($result))  
                          {  
                               echo '  
                               <tr>  
							   <td></td>
                                <td>'.$row["ic"].'</td>    
									<td>'.$row["ResortName"].'</td>  
                                    <td>'.$row["UnitDescription"].'</td>  
                                    <td>'.date('m-d-Y', strtotime( $row['CheckInDate'] )).'</td>
									    <td>'.date('m-d-Y', strtotime( $row['CheckOutDate'] )).'</td>
										
									      
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
            return "<a href=\"new_reserv_allot.php?alotid=" + row.AlotId +  "\">" + "Book This Allotment" + "</a>";
			
        }
    }
 });
 
 </script> 