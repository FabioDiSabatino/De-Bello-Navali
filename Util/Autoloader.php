<?php
/**
* Created by PhpStorm.
* User: Michele Iessi
* Date: 27/03/17
* Time: 18.10
*/

    function myAutoload($class) {
        $class = str_replace('\\','/',$class);
        require $class . '.php';
    }

    spl_autoload_register('myAutoload');

    ?>