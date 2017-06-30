<?php
/**
* Created by PhpStorm.
* User: Michele Iessi
* Date: 27/03/17
* Time: 18.10
*/

    /**
     * @param string $class
     */
    function myAutoload($class) {

        $class = str_replace('\\', '/', $class);
        if (file_exists($class.".php")){
            require $class . '.php';
        }
    }

    spl_autoload_register('myAutoload');


    function autoload_controller($class) {

    $f = 'Model/Controller/' . $class . '.php';
    if ( ! file_exists($f))
    {
    return FALSE;
    }
    include $f;
    }
    spl_autoload_register('autoload_controller');

?>