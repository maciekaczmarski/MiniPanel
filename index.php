<?php
require_once 'src/User.php';
require_once 'src/connection.php';
session_start();

if (!isset($_SESSION ['loggedUserName'])){
    header("Location: login.php");
}
$loggedUser = $_SESSION['loggedUserName'];
?>
Witaj <?php echo $loggedUser;?>
<html>
    <head>
        <meta charset="utf-8" /> 
    </head>
    <body>
        <a href='logout.php'>Logout</a><br>
    </body>
</html>
