<?php 
spl_autoload_register(
    function ($className) {
        $sep = DIRECTORY_SEPARATOR;
        $pasta = "app".$sep;
        if (file_exists("$pasta"."Core$sep".$className.".php"))://Pasta Core
            require_once("$pasta"."Core$sep".$className.".php");

        elseif (file_exists("$pasta"."Controller$sep".$className.".php"))://Pasta Controller
            require_once("$pasta"."Controller$sep".$className.".php");
            
        elseif(file_exists("$pasta"."Model$sep".$className.".php"))://Pasta Model
            require_once("$pasta"."Model$sep".$className.".php");

        elseif(file_exists("lib$sep"."Database$sep"."$className".".php"))://Pasta lib/Database
            require_once("lib$sep"."Database$sep"."$className".".php");
        endif;
    }
);
?>