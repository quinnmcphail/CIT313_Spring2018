<?php

class RegisterController extends Controller
{
    public $userObject;

    public function do_register()
    {

        $this->userObject = new User();

        $data = array('first_name' => $_POST['firstName'], 'last_name' => $_POST['lastName'], 'email' => $_POST['email'], 'password' => password_hash($_POST['password'], PASSWORD_DEFAULT));

        $result = $this->userObject->addUser($data);

        $this->set('message', $result);

    }
}
