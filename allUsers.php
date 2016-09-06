<?php

require_once 'src/connection.php';
require_once 'src/User.php';

$allUsers = User::loadAllUsers($conn);
$length = count($allUsers);
for($i=0; $i < $length; $i++){
    $allUsers[$i]->showUser();

}


