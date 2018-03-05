<?php

class RegisterController extends Controller
{
    public $userObject;

    public function defaultTask()
    {

        $this->userObject = new User();
        $this->set('task', 'add');

    }

    public function add()
    {

        $this->userObject = new User();

        $data = array('first_name'=>$_POST['firstName'],'last_name'=>$_POST['lastName'],'email'=>$_POST['email'],'password'=>password_hash($_POST['password'],PASSWORD_DEFAULT));

        $result = $this->postObject->addUser($data);

        $this->set('message', $result);

    }
}
