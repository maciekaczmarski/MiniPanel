<?php
session_start();

require_once 'src/connection.php';
require_once 'src/User.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $name = isset($_POST['name']) ? $conn->real_escape_string(trim($_POST['name'])) : null;
    $psw = isset($_POST['psw']) ? trim($_POST['psw']) : null;

    if ($userName = User::logIn($conn, $name, $psw)) {
        $_SESSION['loggedUserName'] = $userName;

        header("Location: index.php");
    } else {
        echo "<div class='alert alert-danger'>
        Błędne dane logowania
        </div>";
    }
}
?>
<html>
    <head>
        <title>Logowanie</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <h2>Witaj w panelu logowania</h2>
                <form action='#' method="POST">
                    <div class="form-inline">
                        <div class="form-group">
                            <label for="name">Nazwa użytkownika:</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="psw">Hasło:</label>
                            <input type="password" class="form-control" name="psw">
                        </div>
                        <button type="submit" class="btn btn-default">Zaloguj</button>
                    </div>
                    <a href="register.php" class="btn btn-info" role="button">Rejestracja</a>
                </form>
            </div>
        </div>