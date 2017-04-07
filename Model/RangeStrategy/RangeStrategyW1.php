<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 06/04/17
 * Time: 12.15
 */

namespace Model\RangeStrategy;


/**
 * Class RangeStrategyW1 models the single Square attack.
 *
 *         x
 *   +---+---+---+
 *   |   |   |   |
 *   +---+---+---+
 * y |   | H |   |
 *   +---+---+---+
 *   |   |   |   |
 *   +---+---+---+
 *
 * @package Model\RangeStrategy
 */
class RangeStrategyW1 implements IRangeStrategy {

    /** @var IRangeStrategy Our RangeStrategy Singleton instance  */
    private static $instance = null;
    /** @var int Measures how many horizontal Squares there are in the battlefield */
    private static $dimensionX = 0;
    /** @var int Measures how many vertical Squares there are in the battlefield */
    private static $dimensionY = 0;

    private function __construct($dimensionX = 7, $dimensionY = 7) {
        $this->setDimensionX($dimensionX);
        $this->setDimensionY($dimensionY);
    }

    /** Sets the number of horizontal Squares
     * @param int $dimensionX
     */
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

    /** Calculates the coordinates of the squares hit by the attack
     * @param $x int The x coordinate of the attack
     * @param $y int The y coordinate of the attack
     * @return int[] A list of Square objects hit by the attack
     */
    public function attack($x, $y) {
        $squaresHit = array();

        array_push($squaresHit, array("x"=>$x, "y"=>$y));
        return $squaresHit;
    }

    /**
     * @return IRangeStrategy
     */
    public static function getInstance() {

        $class = __CLASS__;
        if(self::$instance == null) {
            self::$instance = new $class;
        }

        return self::$instance;
    }
}