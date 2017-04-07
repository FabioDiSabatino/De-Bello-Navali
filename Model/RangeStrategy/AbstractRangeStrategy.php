<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 07/04/17
 * Time: 14.29
 */

namespace Model\RangeStrategy;


abstract class AbstractRangeStrategy {

    /** @var int Measures how many horizontal Squares there are in the battlefield */
    private static $dimensionX = 0;
    /** @var int Measures how many vertical Squares there are in the battlefield */
    private static $dimensionY = 0;

    protected function __construct($dimensionX = 7, $dimensionY = 7) {
        $this->setDimensionX($dimensionX);
        $this->setDimensionY($dimensionY);
    }

    public function setDimensionX($dimensionX) {
        self::$dimensionX = $dimensionX;
    }

    public function getDimensionX() {
        return self::$dimensionX;
    }

    public function setDimensionY($dimensionY) {
        self::$dimensionY = $dimensionY;
    }

    public function getDimensionY() {
        return self::$dimensionY;
    }

}