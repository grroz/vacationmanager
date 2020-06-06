<!-- Author: G. Karl Zafiris -->
<html lang="en">
<head>
  <title>Vacation Assignment - Author: Karl Zafiris</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/stylesheet.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <img src="assets/vac.png" class="img-responsive" alt="Vacation Manager Image">
                <h3 class="text-center">Vacation Corporate Manager</h3>
                <p id="author"><span class="glyphicon glyphicon-console"></span> Created by Karl Zafiris</p>
                <form action="./services/user/login.php" method="post" class="col-md-">
                    <input type="email" name="email" id="email" class="form-control" placeholder="e.g: employee@gmail.com" required>
                    <input type="password" name="password" id="password" class="form-control" placeholder="employee password" required>
                    <input type="submit" value="Sign In" class="btn btn-default">
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
</html>
