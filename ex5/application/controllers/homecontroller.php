<?php

class HomeController extends Controller
{
    public function logout()
    {
        $this->set('message', 'User has been logged out.');
    }
}
