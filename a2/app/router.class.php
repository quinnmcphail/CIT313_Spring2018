<?php
    require_once 'app/load.class.php';
    require_once 'app/models/model.class.php';
    require_once 'app/controllers/controller.class.php';

    function loadClasses($class)
    {
        foreach(glob(strtolower($class).'class.php') as $filename){
            echo $filename;
        }
    }

    new Controller();
?>