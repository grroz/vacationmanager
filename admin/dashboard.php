<?php 
    session_start();
    if (!isset($_SESSION['admin'])){
        header('location:../index.php');
    }
    $name = $_SESSION['admin'][1];
    $id = $_SESSION['admin'][0];
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
                <a href="#" class="btn btn-default form-control" id="createNew">Create User</a>
                <div id="createNewForm">
                    <form action="../services/user/create.php" method="post">
                        <input type="text" placeholder="Firstname" name="first" class="form-control" required>
                        <input type="text" placeholder="Lastname" name="last" class="form-control" required>
                        <input type="email" placeholder="Email" name="email" class="form-control" required>
                        <select name="ctype" class="form-control" style="margin-top: 10px;">
                            <option value="user" class="form-control">Employee</option>
                            <option value="admin" class="form-control">Admin</option>
                        </select>
                        <input type="password" placeholder="Choose password" name="pass" class="form-control" required>
                        <input type="password" placeholder="Confirm password" name="cpass" class="form-control" required>
                        <input type="submit" value="Create" class="btn btn-default">
                    </form>
                </div>
            </div>

            <div class="col-md-9">

                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#requests">Requests</a></li>
                    <li><a data-toggle="tab" href="#users">Users</a></li>
                </ul>

                <div class="tab-content">
                    <div id="requests" class="tab-pane fade in active">
                        <h3>All Requests</h3>
                        <?php 
                        $requests = $db->getAllRequests($id); 
                        if (count($requests) == 0){ ?>
                            <h5 class="well">No requests currently available.</h5>
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
                                    <div class="panel-footer text-left">
                                        Requested by: <b><?= $req['employee'] ?></b><br>
                                        Status: <b><?= $req['status'] ?></b><br>
                                        <?php if ($req['status'] == 'pending'){ ?>
                                            <div class="btn-group">
                                                <a class="btn btn-success" href="../services/user/action.php?action=1&rid=<?= $req['rid']?>&uid=<?= $req['emp_id'] ?>&m=<?= $req['emp_mail'] ?>&sub=<?= $req['date_submitted']?>">Approve</a> 
                                                <a class="btn btn-danger" href="../services/user/action.php?action=0&rid=<?= $req['rid']?>&uid=<?= $req['emp_id'] ?>&m=<?= $req['emp_mail'] ?>&sub<?= $req['date_submitted']?>">Reject</a>
                                            </div>
                                        <?php } ?>
                                       
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>



                    <div id="users" class="tab-pane fade">
                        <h3>All Users</h3>
                        <p>(You record has been reducted)</p>
                            <?php $users = $db->getAllUsers(); ?>
                            <?php if (!empty($users)){ ?>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Email</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php foreach($users as $user){ ?>
                                            <?php if ($user['uid'] != $id){ ?>
                                            <tr>
                                                <form action="../services/user/update.php" method="get">
                                                    <input type="hidden" value="<?= $user['uid'] ?>" name="uid">
                                                    <td><input type="text" value="<?= $user['firstname'] ?>" class="form-control" name="first" style="border:none;"></td>
                                                    <td><input type="text" value="<?= $user['lastname'] ?>" class="form-control" name="last" style="border:none;"></td>
                                                    <td><input type="email" value="<?= $user['email'] ?>" class="form-control" name="uemail" style="border:none;"></td>
                                                    <td>
                                                        <select name="utype" class="form-control">
                                                            <?php if ($user['type'] == 'user'){ ?>
                                                                <option value="user">Employee</option>
                                                                <option value="admin">Admin</option>
                                                            <?php } else { ?>
                                                                <option value="admin">Admin</option>
                                                                <option value="user">Employee</option>
                                                            <?php } ?>
                                                        </select>
                                                    </td>
                                                    <td><input type="submit" name="update" value="Update" class="btn btn-warning"></td>
                                                </form>
                                            </tr>   
                                            <?php } ?>                          
                                    <?php } ?>
                                    </table>
                                <?php } else { ?>
                                    <h5 class="alert alert-default">No active users.</h5>
                                <?php } ?>
                    </div>
                
                </div>

            </div>
        </div>
        <p id="author"><span class="glyphicon glyphicon-console"></span> Created by Karl Zafiris</p>
    </div>
</body>
</html>
<script>
    $(document).ready(function(){

        $('#createNewForm').hide();

        $('#createNew').on('click', () => {
            $('#createNewForm').toggle();
        });
    });


</script>
