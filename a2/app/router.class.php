<?php

    function loadClasses($class)
    {
        foreach(glob("app/*.class.php") as $filepath){
            $file = explode("/",$filepath);
            $className = explode(".",$file[count($file)-1]);
            $className = $className[0];
            if(strtolower($class)==$className){
                include $filepath;
            }
        }
        foreach(glob("app/controllers/*.class.php") as $filepath){
            $file = explode("/",$filepath);
            $className = explode(".",$file[count($file)-1]);
            $className = $className[0];
            if(strtolower($class)==$className){
                include $filepath;
            }
        }
        foreach(glob("app/models/*.class.php") as $filepath){
            $file = explode("/",$filepath);
            $className = explode(".",$file[count($file)-1]);
            $className = $className[0];
            if(strtolower($class)==$className){
                include $filepath;
            }
        }
    }

    spl_autoload_register('loadClasses');

    new Controller();
?>