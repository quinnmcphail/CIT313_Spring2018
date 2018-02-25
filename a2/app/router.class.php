<?php

    include_once 'app/controllers/controller.class.php';
    include_once 'app/models/model.class.php';
    include_once 'app/load.class.php';

    function loadClasses($class)
    {
        foreach(glob('*.class.php') as $filename){
            // include $filename;
            echo $filename;
        }
        foreach(glob('controllers/*.class.php') as $filename){
            // include $filename;
            echo $filename;
        }
        foreach(glob('models/*.class.php') as $filename){
            // include $filename;
            echo $filename;
        }
    }

    // spl_autoload_register('loadClasses');
    loadClasses("test");

    new Controller();
?>