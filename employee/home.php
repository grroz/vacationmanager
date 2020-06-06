<?php 
    session_start();
    if (!isset($_SESSION['user'])){
        header('location:../index.php');
    }
    $name = $_SESSION['user'][1];
    $id = $_SESSION['user'][0];
    include '../services/db/DB.php';
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
            <div class="col-md-3">
                <h4>Welcome <?= $name ?></h4>
                <h5>You can sign out <a href="../services/user/logout.php">here</a></h5>
                <a href="./request.php" class="btn btn-default form-control">Submit Request</a>
            </div>
            <div class="col-md-9">
                <h4>All Applications</h4>
                <?php 
                    $requests = $db->getApplicationsPerUser($id); 
                    if (count($requests) == 0){ ?>
                        <h5 class="well">No applications currently available.</h5>
                <?php } else { ?> 
                    <?php foreach($requests as $req){ ?>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Vacation Request - Posted: <b><i><?= $req['date_submitted'] ?></i></b>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <td><span class="labeling">Submitted</span></td>
                                        <td><?= $req['date_submitted'] ?></td>
                                    </tr>
                                    <tr>
                                        <td><span class="labeling">Date from</span></td>
                                        <td><?= $req['dates_requested'][0] ?></td>
                                    </tr>
                                    <tr>
                                        <td><span class="labeling">Date to</span></td>
                                        <td><?= $req['dates_requested'][1] ?></td>
                                    </tr>
                                    <tr>
                                        <td><span class="labeling">Total days</span></td>
                                        <td><?= $req['days_requested'] ?></td>
                                    </tr>
                                </table>                  
                            </div>
                            <div class="panel-footer text-center">
                                Status: <b><?= $req['status']; ?></b>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
        <p id="author"><span class="glyphicon glyphicon-console"></span> Created by Karl Zafiris</p>
    </div>
</body>
</html>