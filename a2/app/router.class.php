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
        // foreach(glob("app/*.class.php") as $filepath){
        //     $file = explode("/",$filepath);
        //     $className = explode(".",$file[count($file)-1]);
        //     $className = $className[0];
        //     if(strtolower($class)==$className){
        //         include $filepath;
        //     }
        // }
        // foreach(glob("app/controllers/*.class.php") as $filepath){
        //     $file = explode("/",$filepath);
        //     $className = explode(".",$file[count($file)-1]);
        //     $className = $className[0];
        //     if(strtolower($class)==$className){
        //         include $filepath;
        //     }
        // }
        // foreach(glob("app/models/*.class.php") as $filepath){
        //     $file = explode("/",$filepath);
        //     $className = explode(".",$file[count($file)-1]);
        //     $className = $className[0];
        //     if(strtolower($class)==$className){
        //         include $filepath;
        //     }
        // }
    }

    spl_autoload_register('loadClasses');

    new Controller();
?>