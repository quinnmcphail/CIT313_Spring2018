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
        $this->user->userID = 'qmcphail';
        $this->user->first_name='Quinn';
        $this->user->last_name='McPhail';
        $this->user->email = 'qmcphail@iupui.edu';
        $this->user->role = 'admin';

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