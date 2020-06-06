<?php 

include '../db/DB.php';
session_start();
// email + pass validation
if ((preg_match('/^\s+$/', $_POST['email'])) || preg_match('/^\s+$/', $_POST['password'])){
    header('location: ../../index.php');
}

// escape for mysql injection
$userEmail = mysqli_real_escape_string($db->link, $_POST['email']);
$userPass = mysqli_real_escape_string($db->link, $_POST['password']);
$userPass = md5(sha1(md5($userPass))); 


$check = $db->checkUser($userEmail, $userPass);
if ($check[0]['type'] == 'user'){
    $_SESSION['user'] = array($check[0]['id'], $check[0]['first'], $check[0]['last']);
    header('location: ../../employee/home.php'); 
}

if ($check[0]['type'] == 'admin'){
    $_SESSION['admin'] = array($check[0]['id'], $check[0]['first'], $check[0]['last']);
    header('location: ../../admin/dashboard.php');
} 

 