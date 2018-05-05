<?php

class RegisterController extends Controller
{
    public $userObject;

    public function index()
    {

        $this->set('task', 'do_register');

    }

    public function do_register()
    {

        $this->userObject = new User();
        if ($_POST['password'] === $_POST['passwordVerify']) {
            $data = array('first_name' => $_POST['firstName'], 'last_name' => $_POST['lastName'], 'email' => $_POST['email'], 'password' => password_hash($_POST['password'], PASSWORD_DEFAULT));

            $result = $this->userObject->addUser($data);
        } else {
            $result = 'Passwords do not match. User not added.';
        }

        $this->set('message', $result);

    }
}
