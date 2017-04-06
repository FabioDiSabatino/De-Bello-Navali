<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 31/03/17
 * Time: 10.27
 */

namespace Model\RangeStrategy;


use Model\Square;

interface IRangeStrategy {

    /**
     * @param $x int The x coordinate of the attack
     * @param $y int The y coordinate of the attack
     * @return int[] A list of Square objects hit by the attack
     */
    public function attack($x, $y);

    public static function getInstance();

    public function setDimensionX($dimensionX);
    public function getDimensionX();
    public function setDimensionY($dimensionY);
    public function getDimensionY();

}