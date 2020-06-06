<?php 

include '../db/DB.php';

$name = mysqli_real_escape_string($db->link, $_POST['first']);
$surname = mysqli_real_escape_string($db->link, $_POST['last']);
$mail = mysqli_real_escape_string($db->link, $_POST['email']);
$userType = mysqli_real_escape_string($db->link, $_POST['ctype']);
$pass = mysqli_real_escape_string($db->link, $_POST['pass']);
$confPass = mysqli_real_escape_string($db->link, $_POST['cpass']);

// validations
if (preg_match('/^\s+$/', $name)){
    header('location:../../admin/dashboard.php');
}
if (preg_match('/^\s+$/', $surname)){
    header('location:../../admin/dashboard.php');
}
if (preg_match('/^\s+$/', $mail)){
    header('location:../../admin/dashboard.php');
}
if (preg_match('/^\s+$/', $pass)){
    header('location:../../admin/dashboard.php');
}
if (preg_match('/^\s+$/', $confPass)){
    header('location:../../admin/dashboard.php');
}
if ($pass != $confPass){
    header('location:../../admin/dashboard.php');
}

$pass = md5(sha1(md5($pass)));
$prepared = array(
    'name' => $name, 
    'surname' => $surname,
    'mail' => $mail, 
    'user_type' => $userType, 
    'pass' => $pass
);

$res = $db->createUser($prepared);

header('location:../../admin/dashboard.php');