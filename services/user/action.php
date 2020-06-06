<?php 

include '../db/DB.php';

$action = mysqli_real_escape_string($db->link, $_GET['action']);
$feedback = ($action) ? 'accepted' : 'rejected';
$request = mysqli_real_escape_string($db->link, $_GET['rid']);
$userid = mysqli_real_escape_string($db->link, $_GET['uid']);
$mail = mysqli_real_escape_string($db->link, $_GET['m']);
$submitted = mysqli_real_escape_string($db->link, $_GET['sub']);

$res = $db->updateRequest($action, $request, $userid);

$to = $mail; 
$subject = "Vacation Request Status (Posted in: ".$submitted.")";
$message = "<body><p>Dear employee,<br><br>your supervisor has ". $feedback ." your application submitted on " . $submitted . ".</p>
            </body>";

$headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";
mail($to, $subject, $message, $headers);

header('location: ../../admin/dashboard.php');