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
    private static $dimension = 0;

    private function __construct($dimension = 7) {
        $this->setDimension($dimension);
    }

    private function setDimension($dimension) {
        self::$dimension = $dimension;
    }

    private function getDimension() {
        return self::$dimension;
    }

    /**
     * @param $x int The x coordinate of the center of the attack
     * @param $y int The y coordinate of the center of the attack
     * @return array int[] A list of Square objects hit by the attack
     */
    public function attack($x, $y) {
        $squaresHit = array();
        $dim = $this->getDimension();

        array_push($squaresHit, array("x"=>$x,"y"=>$y));        // inserisco il centro dell'attacco tra le squares colpite

        if(($x+1)<=$dim && $y<=$dim) {
            array_push($squaresHit, array("x"=>$x+1,"y"=>$y));  // inserisco la square a destra del centro
        }

        if($x<=$dim && ($y+1)<=$dim) {
            array_push($squaresHit, array("x"=>$x,"y"=>$y+1));   // inserisco la square sotto il centro
        }

        if(($x+1)<=$dim && ($y+1)<=$dim) {
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