<?php

class LoginController extends Controller
{
    public $userObject;

    public function defaultTask()
    {

        $this->set('task', 'do_login');

    }
    public function do_login()
    {
        $this->userObject = new User();
        if ($this->userObject->checkUser($_POST['email'], $_POST['password'])) {
            $userInfo = $this->userObject->getUserFromEmail($_POST['email']);

            $_SESSION['uID'] = $userInfo['uID'];
            header("Location: " . BASE_URL);
        } else {
            $this->set('message', 'Incorrect Login Information');
            $this->set('task', 'do_login');
        }
    }
    public function logout()
    {
        unset($_SESSION["uID"]);
        session_write_close();
        header("Location: " . BASE_URL . '?action=logout');
    }
}
