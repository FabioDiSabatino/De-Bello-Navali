<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 06/04/17
 * Time: 12.29
 */

namespace Model\Factories\RangeStrategyFactory;


use Model\RangeStrategy\IRangeStrategy;
use Model\RangeStrategy\RangeStrategyW1;
use Model\RangeStrategy\RangeStrategyW2;
use Model\RangeStrategy\RangeStrategyW3;

/**
 * Class RangeStrategyFactory creates RangeStrategy objects to be put inside Weapon objects.
 * @package Model\Factories\RangeStrategyFactory
 */
class RangeStrategyFactory {

    private static $instance = null;

    /**
     * @param $rangeName
     * @return IRangeStrategy|null
     */
    public function createStrategyRange($rangeName) {

        $functionName = "createStrategy$rangeName";

        if(method_exists(self::class, $functionName)) {
            return call_user_func(array(self::class, $functionName));
        }
        return null;
    }

    private function createStrategyW1() {
        return RangeStrategyW1::getInstance();
    }

    private function createStrategyW2() {
        return RangeStrategyW2::getInstance();
    }

    private function createStrategyW3() {
        return RangeStrategyW3::getInstance();
    }

    /**
     * @return RangeStrategyFactory
     */
    public static function getInstance() {

        $class = __CLASS__;
        if(self::$instance == null) {
            self::$instance = new $class;
        }

        return self::$instance;
    }


}