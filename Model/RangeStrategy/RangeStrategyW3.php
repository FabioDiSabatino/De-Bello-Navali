<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 06/04/17
 * Time: 12.15
 */

namespace Model\RangeStrategy;


/**
 * Class RangeStrategyW1 models the four Square squared attack.
 *
 *         x
 *   +---+---+---+
 *   |   |   |   |
 *   +---+---+---+
 * y |   | H | H |
 *   +---+---+---+
 *   |   | H | H |
 *   +---+---+---+
 *
 * @package Model\RangeStrategy
 */
class RangeStrategyW3 implements IRangeStrategy {

    /** @var IRangeStrategy Our RangeStrategy Singleton instance  */
    private static $instance = null;
    private static $dimensionX = 0;
    private static $dimensionY = 0;

    private function __construct($dimensionX = 7, $dimensionY = 7) {
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

    /** Calculates the coordinates of the squares hit by the attack
     * @param $x int The x coordinate of the center of the attack
     * @param $y int The y coordinate of the center of the attack
     * @return array int[] A list of Square objects hit by the attack
     */
    public function attack($x, $y) {
        $squaresHit = array();
        $dimX = $this->getDimensionX();
        $dimY = $this->getDimensionY();

        array_push($squaresHit, array("x"=>$x,"y"=>$y));        // inserisco il centro dell'attacco tra le squares colpite

        if(($x+1)<=$dimX && $y<=$dimY) {
            array_push($squaresHit, array("x"=>$x+1,"y"=>$y));  // inserisco la square a destra del centro
        }

        if($x<=$dimX && ($y+1)<=$dimY) {
            array_push($squaresHit, array("x"=>$x,"y"=>$y+1));   // inserisco la square sotto il centro
        }

        if(($x+1)<=$dimX && ($y+1)<=$dimY) {
            array_push($squaresHit, array("x"=>$x+1,"y"=>$y+1));   // inserisco la square in basso a destra del centro
        }

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