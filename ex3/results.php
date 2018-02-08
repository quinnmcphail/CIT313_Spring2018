<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    function loadClasses($class)
    {
        include_once 'classes/' . strtolower($class) . '.class.php';
    }

    spl_autoload_register('loadClasses');

    $POSTuser = new RegisteredUser('newuser', 'regular');
    $POSTuser->first_name = $_POST["firstName"];
    $POSTuser->last_name = $_POST["lastName"];
    $POSTuser->emailAddress = $_POST["email"];

    print_r($POSTuser);
?>