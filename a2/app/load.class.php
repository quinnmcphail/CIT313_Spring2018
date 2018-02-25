<?php
class Load {
    function view($file_name,$data=null){
        if(is_array($data)){
            extract($data);
        }

        include 'views/'.$file_name;
    }

    public function __construct(){}

    public function __set($name,$value){
        $this->$name = $value;
    }

    public function __get($name){
        return $this->$name;
    }

    public function __destruct(){}
}
?>