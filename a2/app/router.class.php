<?php

    include_once 'app/controllers/controller.class.php';
    include_once 'app/models/model.class.php';
    include_once 'app/load.class.php';

    function loadClasses($class)
    {
        foreach(glob("app/*.class.php") as $filename){
            // include $filename;
            echo $filename;
        }
        foreach(glob("app/controllers/*.class.php") as $filename){
            // include $filename;
            echo $filename;
        }
        foreach(glob("app/models/*.class.php") as $filename){
            // include $filename;
            echo $filename;
        }
    }

    // spl_autoload_register('loadClasses');
    loadClasses("test");

    new Controller();
?>