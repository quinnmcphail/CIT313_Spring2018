<?php

class MembersController extends Controller
{

    public $userObject;

    public function user($uID)
    {

        $this->userObject = new User();
        $user = $this->userObject->getUser($uID);
        $this->set('user', $user);

    }

    public function profile(){

    }

    public function update(){
        $this->userObject = new User();
        if ($_POST['password'] == "" && $_POST['passwordVerify'] == "") {
            $data = array('first_name' => $_POST['firstName'], 'last_name' => $_POST['lastName'], 'email' => $_POST['email'], 'uID' => $_POST['uID']);

            $result = $this->userObject->updateUser($data);
        } else {
            if ($_POST['password'] === $_POST['passwordVerify']) {
                $data = array('first_name' => $_POST['firstName'], 'last_name' => $_POST['lastName'], 'email' => $_POST['email'], 'password' => password_hash($_POST['password'], PASSWORD_DEFAULT), 'uID' => $_POST['uID']);

                $result = $this->userObject->updateUserPass($data);
            } else {
                $result = 'Passwords do not match. User not updated.';
            }
        }
        $this->set('message', $result);
        $users = $this->userObject->getAllUsers();
        $this->set('title', 'Users');
        $this->set('users', $users);
    }

    public function index()
    {

        $this->userObject = new User();
        $users = $this->userObject->getAllUsers();
        $this->set('title', 'Users');
        $this->set('users', $users);

    }

}
