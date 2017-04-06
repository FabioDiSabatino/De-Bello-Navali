<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 06/04/17
 * Time: 12.29
 */

namespace Model\Factories\RangeStrategyFactory;


class RangeStrategyFactory {

    public function createStrategyRange($rangeName) {

        $functionName = "createStrategy$rangeName";
        if(function_exists($functionName)) {
            return call_user_func($functionName);
        }
        return null;
    }

    private function createStrategyW1() {}
    private function createStrategyW2() {}
    private function createStrategyW3() {}
}