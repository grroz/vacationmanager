<?php 
    session_start();
    if (!isset($_SESSION['user'])){
        header('location:../index.php');
    }
    $name = $_SESSION['user'][1];
?>
<html lang="en">
<head>
  <title>Vacation Assignment - Author: Karl Zafiris</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/stylesheet.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">  
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <a href="./home.php" class="pull-right" style="text-decoration:none;color:#000;"><span class="glyphicon glyphicon-arrow-left"></span> Go back</a>                
                <form action="../services/user/new_request.php" method="post">
                    <h4>Submit Request</h4>
                    <label>Date from</label>
                    <input type="date" class="form-control" name="date_start" required>
                    <label>Date to</label>
                    <input type="date" class="form-control" name="date_end" required>
                    <label>Reason</label>
                    <textarea name="reason" rows="5" class="form-control" required></textarea>
                    <input type="submit" name="submit_request" value="Submit" class="btn btn-primary">
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
        <p id="author"><span class="glyphicon glyphicon-console"></span> Created by Karl Zafiris</p>
    </div>
</body>
</html>