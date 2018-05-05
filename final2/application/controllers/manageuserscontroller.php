<?php

class ManageUsersController extends Controller
{

    public $userObject;
    protected $access = 1;

    public function user($uID)
    {

        $this->userObject = new User();
        $user = $this->userObject->getUser($uID);
        $this->set('user', $user);

    }

    public function index()
    {

        $this->userObject = new User();
        $users = $this->userObject->getAllUsers();
        $this->set('title', 'Manage Users');
        $this->set('users', $users);

    }

    public function delete($uID){
        $this->userObject = new User();
        $message = $this->userObject->deleteUser($uID);
        $users = $this->userObject->getAllUsers();
        $this->set('users', $users);
        $this->set('title', 'Manage Users');
        $this->set('message', $message);
    }

    public function approve($uID){
        $this->userObject = new User();
        $message = $this->userObject->approveUser($uID);
        $users = $this->userObject->getAllUsers();
        $this->set('users', $users);
        $this->set('title', 'Manage Users');
        $this->set('message', $message);
    }

}
