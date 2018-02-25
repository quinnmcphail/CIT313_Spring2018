<?php
class Controller {

    public $load;
    public $user;

    function __construct(){
        $this->load = new Load();
        $this->user = new User();
        $this->home();
    }

    function home(){
        $this->user->set('userID','qmcphail');
        $this->user->set('first_name','Quinn');
        $this->user->set('last_name','McPhail');
        $this->user->set('email','qmcphail@iupui.edu');
        $this->user->set('role','admin');

        $data = $this->user->getName();
        $this->load->view('view.php',$data);
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