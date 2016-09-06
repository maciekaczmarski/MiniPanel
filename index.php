<?php
require_once 'src/User.php';
require_once 'src/connection.php';
session_start();

if (!isset($_SESSION ['loggedUserName'])) {
    header("Location: login.php");
}
$loggedUser = $_SESSION['loggedUserName'];
?>

<html>
    <head>
        <title>Mini-Panel</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            .sidenav {
                background-color: #f1f1f1;
                height: 100%;

            </style>
        </head>
        <body>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">Mini-Panel</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li><a href="#"></a></li>
                        <li><a href="#"><div class="glyphicon glyphicon-refresh"> 4</div></a></li>
                        <li><a href="#"><div class="glyphicon glyphicon-envelope"> 10</div></a></li>
                    </ul>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="row content">
                    <div class="col-sm-2 sidenav">
                        <h4>Witaj <?php echo $loggedUser; ?></h4>
                        <ul class="nav nav-pills nav-stacked">
                            <li class="active"><a href="#section1">Home</a></li>
                            <li><a href='allUsers.php'>Użytkownicy</a></li>
                            <li><a href='logout.php'>Wyloguj</a></li>
                        </ul><br>
                    </div>
                    <div class="col-sm-9">
                    </div>
                </div>
            </div>

            <footer class="container-fluid">
            </footer>
    </body>
</html>