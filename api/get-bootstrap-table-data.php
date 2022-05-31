<?php
session_start();

// set time for session timeout
$currentTime = time() + 25200;
$expired = 3600;

// // if session not set go to login page
// if (!isset($_SESSION['user'])) {
//     header("location:index.php");
// }

// // if current time is more than session timeout back to login page
// if ($currentTime > $_SESSION['timeout']) {
//     session_destroy();
//     header("location:index.php");
// }

// destroy previous session timeout and create new one
unset($_SESSION['timeout']);
$_SESSION['timeout'] = $currentTime + $expired;

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");



include_once('../includes/crud.php');

$db = new Database();
$db->connect();






if (isset($_GET['table']) && $_GET['table'] == 'students') 
{
    $offset = 0;
    $limit = 10;
    $where = '';
    $sort = 'id';
    $order = 'DESC';
    if (isset($_GET['offset']))
        $offset = $db->escapeString($_GET['offset']);
    if (isset($_GET['limit']))
        $limit = $db->escapeString($_GET['limit']);
    if (isset($_GET['sort']))
        $sort = $db->escapeString($_GET['sort']);
    if (isset($_GET['order']))
        $order = $db->escapeString($_GET['order']);

    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $search = $db->escapeString($_GET['search']);
        $where .= "WHERE name like '%" . $search . "%' OR id like '%" . $search . "%' OR email like '%" . $search . "%' OR mobile like '%" . $search . "%' ";
    }
    if (isset($_GET['sort'])){
        $sort = $db->escapeString($_GET['sort']);

    }
    if (isset($_GET['order'])){
        $order = $db->escapeString($_GET['order']);

    }
    $sql = "SELECT COUNT(`id`) as total FROM `students` " . $where;
    $db->sql($sql);
    $res = $db->getResult();
   
    
    foreach ($res as $row)
        $total = $row['total'];
       
   
    //$sql = "SELECT * FROM users $where ORDER BY $sort $order";
    $sql = "SELECT * FROM students " . $where . " ORDER BY " . $sort . " " . $order . " LIMIT " . $offset . ", " . $limit;
    $db->sql($sql);
    $res = $db->getResult();
    
    $bulkData = array();
    $bulkData['total'] = $total;
   
    
    $rows = array();
    $tempRow = array();

   
    
    foreach ($res as $row) {
        $sql="SELECT * FROM students";
        $db->sql($sql);
        $res = $db->getResult();

    
        $tempRow['id'] = $row['id'];
        $tempRow['name'] = $row['name'];
        $tempRow['student_age'] = $row['student_age'];
        $tempRow['class'] = $row['class'];
        $tempRow['school_name'] = $row['school_name'];
        $tempRow['school_address'] = $row['school_address'];
        $tempRow['aadhar_number'] = $row['aadhar_number'];
        $tempRow['parent_name'] = $row['parent_name'];
        $tempRow['parent_phone_number'] = $row['parent_phone_number'];
        $tempRow['email'] = $row['email'];
        $tempRow['password'] = $row['password'];
        $tempRow['utr_number'] = $row['utr_number'];
        $tempRow['status'] = $row['status'];
        $tempRow['profile'] = "<a data-lightbox='product' href='" . DOMAIN_URL . $row['profile'] . "'><img src='" . DOMAIN_URL . $row['profile'] . "' height='50' /></a>";
        $operate= '<a href="edit-students.php?id=' . $row['id'] . '"><i class="fa fa-edit"></i></a>';
        $tempRow['operate'] = $operate;
        
        
        $rows[] = $tempRow;
    }
    $bulkData['rows'] = $rows;
    print_r(json_encode($bulkData));
}



$db->disconnect();
