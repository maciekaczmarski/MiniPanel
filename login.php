<?php

session_start();

require_once 'src/connection.php';
require_once 'src/User.php';

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    $name = isset($_POST['name']) ?  $conn->real_escape_string(trim($_POST['name'])) : null;
    $psw = isset($_POST['psw']) ? trim($_POST['psw']) : null;
    
    if($userName = User::logIn($conn, $name, $psw)){
        $_SESSION['loggedUserName'] = $userName;

        header("Location: index.php");
    }
    else{
        echo "Błędne dane logowania"; 
    }
}


?>
<html>
    <head>
        <title>Logowanie</title>
    </head>
    <body>
        <form action='#' method="POST">
            <fieldset>
                <legend>Logowanie</legend>
            <label>
                Nazwa użytkownika:
                <input type="text" name='name'/>
            </label><br>
            <label>
                Hasło:
                <input type="password" name='psw'/>
            </label><br>
            <input type='submit' value='Login'>
            </fieldset>
    </body>
</html>
