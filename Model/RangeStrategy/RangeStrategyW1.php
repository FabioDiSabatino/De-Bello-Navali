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
    private static $dimension = 0;

    private function __construct($dimension = 7) {
        $this->setDimension($dimension);
    }

    private function setDimension($dimension) {
        self::$dimension = $dimension;
    }

    /**
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