<?php
/**
* Created by PhpStorm.
* User: Michele Iessi
* Date: 27/03/17
* Time: 18.10
*/

    function __autoload($class) {

        $class = str_replace('\\','/',$class);
        //echo $class;
        require $class . '.php';

    }
