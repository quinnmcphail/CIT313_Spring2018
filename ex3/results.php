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
    $POSTuser->email_address = $_POST["email"];

    if($POSTuser instanceof RegisteredUser){
        echo "First Name: ".$POSTuser->first_name."<br>";
        echo "Last Name: ".$POSTuser->last_name."<br>";
        echo "Email Address: ".$POSTuser->email_address."<br>";
    }else{
        echo "The object is not an instance of RegisteredUser";
    }
?>