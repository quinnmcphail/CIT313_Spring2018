<?php

    function loadClasses($class)
    {
        foreach(glob(strtolower($class).'class.php') as $filename){
            include $filename;
            echo $filename;
        }
        foreach(glob('controllers/'.strtolower($class).'class.php') as $filename){
            include $filename;
            echo $filename;
        }
        foreach(glob('models/'.strtolower($class).'class.php') as $filename){
            include $filename;
            echo $filename;
        }
    }

    spl_autoload_register('loadClasses');

    new Controller();
?>