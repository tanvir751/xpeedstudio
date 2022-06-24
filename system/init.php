<?php

    spl_autoload_register(function($className){
        include "classes/$className.php";
    });
    

    $route = new Route; 
?>