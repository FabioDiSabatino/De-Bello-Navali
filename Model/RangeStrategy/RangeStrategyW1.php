<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 06/04/17
 * Time: 12.15
 */

namespace Model\RangeStrategy;


use Model\Square;

class RangeStrategyW1 implements IRangeStrategy {

    /** @var IRangeStrategy Our RangeStrategy Singleton instance  */
    private static $instance = null;

    private function __construct() {}

    /**
     * @param $x
     * @param $y
     * @return Square[]
     */
    public function attack($x, $y)
    {
        // TODO: Implement attack() method.
    }

    /**
     * @return IRangeStrategy
     */
    public static function getInstance() {

        $class = __CLASS__;                 // It's the name of this specific class
        if(self::$instance == null) {
            self::$instance = new $class;
        }

        return self::$instance;
    }
}