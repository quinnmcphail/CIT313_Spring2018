<?php

    function loadClasses($class)
    {
        if(file_exists('app/'.strtolower($class).'.class.php')){
            include 'app/'.strtolower($class).'.class.php';
        }
        if(file_exists('app/models/'.strtolower($class).'.class.php')){
            include 'app/models/'.strtolower($class).'.class.php';
        }
        if(file_exists('app/controllers/'.strtolower($class).'.class.php')){
            include 'app/controllers/'.strtolower($class).'.class.php';
        }
    }

    spl_autoload_register('loadClasses');

    new Controller();
?>