<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'src/connection.php';
    require_once 'src/User.php';

    $name = isset($_POST['name']) ? $conn->real_escape_string(trim($_POST['name'])) : null;
    $psw = isset($_POST['psw']) ? $conn->real_escape_string(trim($_POST['psw'])) : null;
    $passwordConfirmation = isset($_POST['pswConfirmation']) ? trim($_POST['pswConfirmation']) : null;

    $user = User::getUserByName($conn, $name);
    if ($name && $psw && $psw == $passwordConfirmation && !$user) {

        $newUser = new User();
        $newUser->setName($name);
        $newUser->setHashedPassword($psw);

        if ($newUser->savetoDB($conn)) {
            header("Location: login.php");
        } else {
            echo "rejestracja nie powiodła sie<br>";
        }
    } else {
        if ($user) {
            echo "Podana nazwa użytkownika istnieje w bazie danych";
        } else {
            echo "Nieprawidłowe dane<br>";
        }
    }
}
?>

<html>
    <head>
        <title>Rejestracja</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <h2>Formularz rejestracyjny</h2>
                <form action='#' method="POST">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label for="name">Nazwa użytkownika:</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="psw">Hasło:</label>
                            <input type="password" class="form-control" name="psw">
                        </div>
                        <div class="form-group">
                            <label for="pswConfirmation">Potwierdź hasło:</label>
                            <input type="password" class="form-control" name="pswConfirmation">
                        </div>
                        <button type="submit" class="btn btn-default">Rejestracja</button>
                    </div>
                </form>
            </div>
        </div>