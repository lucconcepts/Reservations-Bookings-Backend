<?php
    //database configuration
include 'rriconfigs/config.php';
include 'rriconfigs/session.php';

    //connect with the database
 
    
    //get search term
    $searchTerm = $_GET['term'];
    
    //get matched data from skills table
    $query = mysqli_query($connect,"SELECT * FROM resorts WHERE ResortName LIKE '%".$searchTerm."%' ORDER BY ResortName ASC");
    while ($row = mysqli_fetch_assoc($query)) {
        $data[] = array('value' => $row['ResortName'], 'id' => $row['id'], 'tx' => $row['Taxrate']);
    }
    //LEFT JOIN units ON resorts.id=units.resortid
    //return json data
    echo json_encode($data);
?>