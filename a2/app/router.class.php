<?php

    include_once 'app/controllers/controller.class.php';
    include_once 'app/models/model.class.php';
    include_once 'app/load.class.php';

    function loadClasses($class)
    {
        foreach(glob("app/*.class.php") as $filepath){
            // include $filename;
            $file = explode("/",$filepath);
            $className = explode(".",$file[count($file)-1])[0];
            echo $className;
        }
        foreach(glob("app/controllers/*.class.php") as $filepath){
            // include $filename;
            $file = explode("/",$filepath);
            $className = explode(".",$file[count($file)-1])[0];
            echo $className;
        }
        foreach(glob("app/models/*.class.php") as $filepath){
            // include $filename;
            $file = explode("/",$filepath);
            $className = explode(".",$file[count($file)-1])[0];
            echo $className;
        }
    }

    // spl_autoload_register('loadClasses');
    loadClasses("test");

    new Controller();
?>