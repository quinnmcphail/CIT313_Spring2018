<?php
abstract class Model {

    protected $userID;
    protected $firstname;
    protected $lastname;
    protected $email;
    protected $role;

    public function __construct(){
        //We will revisit
    }

    public function __set($name,$value){
        $this->$name = $value;
    }

    public function __get($name){
        return $this->$name;
    }

    public function __destruct(){}
}
?>