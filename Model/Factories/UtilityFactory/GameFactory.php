<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 07/04/17
 * Time: 10.57
 */

namespace Model\Factories\UtilityFactory;


class GameFactory {

    private static $instance = null;

    public static function getInstance() {

        $class = __CLASS__;
        if(self::$instance == null) {
            self::$instance = new $class;
        }

        return self::$instance;
    }


}