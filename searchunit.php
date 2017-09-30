<?php
    //database configuration
include 'rriconfigs/config.php';
include 'rriconfigs/session.php';
    //connect with the database
 
    
    //get search term
    $searchTerm = $_GET['t'];
    
    //get matched data from skills table
    $query = mysqli_query($connect,"SELECT * FROM units WHERE ResortId = '".$searchTerm."' ORDER BY UnitType ASC");
    while ($row = mysqli_fetch_assoc($query)) {
        $data[] = array('value' => $row['UnitType'], 'id' => $row['id']);
    }
	
	
	
	
    //LEFT JOIN units ON resorts.id=units.resortid
    //return json data
    echo json_encode($data);
?>