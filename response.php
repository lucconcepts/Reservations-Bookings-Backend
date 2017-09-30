<?php 
session_start();
include 'rriconfigs/config2.php';

    $db = new dbObj();
    $connString =  $db->getConnstring();

    $params = $_REQUEST;
    
    $action = isset($params['action']) != '' ? $params['action'] : '';
    $empCls = new Employee($connString);

    switch($action) {
     default:
     $empCls->getEmployees($params);
     return;
    }
    class Employee {
    protected $conn;
    protected $data = array();
    function __construct($connString) {
        $this->conn = $connString;
    }
    
    public function getEmployees($params) {
    
    $this->data = $this->getRecords($params);
    
    echo json_encode($this->data);
  }
    
    function getRecords($params) {
    $rp = isset($params['rowCount']) ? $params['rowCount'] : 10;
    
    if (isset($params['current'])) { $page  = $params['current']; } else { $page=1; };  
        $start_from = ($page-1) * $rp;
    
    $sql = $sqlRec = $sqlTot = $where = '';
    
    if( !empty($params['searchPhrase']) ) {   
      $where .=" WHERE ";
      $where .=" ( employee_name LIKE '".$params['searchPhrase']."%' ";    
      $where .=" OR employee_salary LIKE '".$params['searchPhrase']."%' ";

      $where .=" OR employee_age LIKE '".$params['searchPhrase']."%' )";
     }
     
     // getting total number records without any search
    $sql = "SELECT * FROM `employee` ";
    $sqlTot .= $sql;
    $sqlRec .= $sql;
    
    //concatenate search sql if value exist
    if(isset($where) && $where != '') {

      $sqlTot .= $where;
      $sqlRec .= $where;
    }
    if ($rp!=-1)
    $sqlRec .= " LIMIT ". $start_from .",".$rp;
    
    
    $qtot = mysqli_query($this->conn, $sqlTot) or die("error to fetch tot employees data");
    $queryRecords = mysqli_query($this->conn, $sqlRec) or die("error to fetch employees data");
    
    while( $row = mysqli_fetch_assoc($queryRecords) ) { 
      $data[] = $row;
    }

    $json_data = array(
      "current"            => intval($params['current']), 
      "rowCount"            => 10,      
      "total"    => intval($qtot->num_rows),
      "rows"            => $data   // total data array
      );
    
    return $json_data;
  }