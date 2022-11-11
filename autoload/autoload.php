<?php
 
    spl_autoload_register(function ($className) 
    {
        $finderClasses = "classes/{$className}.php";

        include $finderClasses; 
        
    });
