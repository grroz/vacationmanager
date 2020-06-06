<?php 

include '../db/DB.php';

$action = mysqli_real_escape_string($db->link, $_GET['action']);
$request = mysqli_real_escape_string($db->link, $_GET['rid']);
$userid = mysqli_real_escape_string($db->link, $_GET['uid']);

$res = $db->updateRequest($action, $request, $userid);

// mail user for approval/rejection

header('location: ../../admin/dashboard.php');