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

    /** Computes which Squares are hit by the attack
     * @param $x int The x coordinate of the center of attack
     * @param $y int The y coordinate of the center of  attack
     * @return int[] A list of coordinates of Squares hit by the attack
     */
    public function attack($x, $y);

    public static function getInstance($dimensionX, $dimensionY);

    public function setDimensionX($dimensionX);
    public function getDimensionX();

    public function setDimensionY($dimensionY);
    public function getDimensionY();

}