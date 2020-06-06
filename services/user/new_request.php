<?php 

include '../db/DB.php';
session_start();
$user = $_SESSION['user'][0];
$name = $_SESSION['user'][1];

$dateStart = $_POST['date_start'];
$dateEnd = $_POST['date_end'];
$reason = mysqli_real_escape_string($db->link, $_POST['reason']);
$submitted = date('Y-m-d');

$res = $db->publishRequest($dateStart, $dateEnd, $reason, $submitted, $user); 

$to = "zaf.mitx@gmail.com"; // modify this to match your email
$subject = "Vacation Request (Employee: " . $name . ")";
$message = "<body>
                <p>Dear supervisor<br><br>
                Employee " . $name . " requested for some time off, starting on
                " . $dateStart . " and ending on " . $dateEnd . ", stating the reason: " . $reason . "
                Click on one of the below links to approve or reject the application: <br><br>
                <a href='localhost/epignosis_assignment/index.php'>Approve</a> | 
                <a href='localhost/epignosis_assignment/index.php>Reject</a>
                </p>
            </body>";

$headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";
mail($to, $subject, $message, $headers);

if ($res){
    header('location: ../../employee/home.php');
} else {
    header('location: ../../employee/request.php');
}