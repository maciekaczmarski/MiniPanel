<?php

class User {
    
    static public function logIn(mysqli $conn, $name, $psw){
        $sql = "SELECT * FROM User WHERE name = '$name'";
        $result = $conn->query($sql);
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            if($psw == $row['psw']){
                return $row['name'];
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
    
    protected $id;
    protected $name;
    protected $psw;
    
    public function __construct(){
        $this->id = -1;
        $this->name = '';
        $this->psw = '';
    }
    
    public function setId($id){
        $this->id = is_integer($id) ? $id : -1;
        return $this;
    }
    
    public function  setName($name){
        $this->email = is_string($name) ? $name : '';
        return $this;
    }
    
    public function setPassword($psw) {
        $this->psw = is_string($psw) ? $psw : '';
        
    }
    
    public function getId(){
        return $this->id;
    }
    
        public function getName(){
        return $this->name;
    }
        public function getPassword(){
        return $this->psw;
    }
    
    
}

