<?php 

include '../db/DB.php';

$userid = mysqli_real_escape_string($db->link, $_GET['uid']);
$first = mysqli_real_escape_string($db->link, $_GET['first']);
$last = mysqli_real_escape_string($db->link, $_GET['last']);
$uemail = mysqli_real_escape_string($db->link, $_GET['uemail']);
$utype = mysqli_real_escape_string($db->link, $_GET['utype']);

$res = $db->updateUser($userid, $first, $last, $uemail, $utype);

header('location:../../admin/dashboard.php');
