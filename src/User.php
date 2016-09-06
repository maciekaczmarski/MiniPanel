<?php

class User {

    static public function logIn(mysqli $conn, $name, $psw) {
        $sql = "SELECT * FROM User WHERE name = '$name'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($psw, $row['psw'])) {
                return $row['name'];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    static public function getUserByName(mysqli $conn, $name) {
        $sql = "SELECT * FROM User WHERE name = '$name'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $user = new User();
            $user->setId((int) $row['id']);
            $user->setName($row['name']);
            $user->setPassword($row['psw']);
            return $user;
        } else {
            return false;
        }
    }

    static public function loadAllUsers(mysqli $conn) {
        $sql = "SELECT * FROM User";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $allUsers = array();
            foreach ($result as $row) {
                $newUser = new User();
                $newUser->id = (int) $row['id'];
                $newUser->name = $row['name'];
                $allUsers[] = $newUser;
            }
            return $allUsers;
        } else {
            return [];
        }
    }

    protected $id;
    protected $name;
    protected $psw;

    public function __construct() {
        $this->id = -1;
        $this->name = '';
        $this->psw = '';
    }

    public function setId($id) {
        $this->id = is_integer($id) ? $id : -1;
    }

    public function setName($name) {
        $this->name = is_string($name) ? $name : '';
    }

    public function setPassword($psw) {
        $this->psw = is_string($psw) ? $psw : '';
    }

    public function setHashedPassword($psw) {
        $this->psw = is_string($psw) ? password_hash($psw, PASSWORD_DEFAULT) : '';
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function saveToDB(mysqli $conn) {
        if ($this->id == -1) {
            $sql = "INSERT INTO User (name, psw)
                    VALUES ('$this->name', '$this->psw')";

            if ($conn->query($sql)) {
                $this->id = $conn->insert_id;
                return $this;
            } else {
                return false;
            }
        } else {
            $sql = "UPDATE User SET
                    name = '$this->name',
                    psw = '$this->psw',
                    WHERE id = $this->id";
        }
        if ($conn->query($sql)) {
            return $this;
        } else {
            return false;
        }
    }
    
    public function showUser(){
      echo  "ID: " .$this->id.
            " Name: " .$this->name. "<br>";
    }
}
