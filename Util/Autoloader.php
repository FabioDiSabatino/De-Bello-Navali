<?php
/**
* Created by PhpStorm.
* User: Michele Iessi
* Date: 27/03/17
* Time: 18.10
*/

    function __autoload($class) {
        // considerazioni sulle prestazioni: usando i namespaces si evita di inserire informazioni relative ai path relativi delle singole classi
        $class = str_replace('\\','/',$class);
        require $class . '.php';

    }
