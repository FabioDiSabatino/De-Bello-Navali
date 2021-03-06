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
 * <code>
 *         x
 *   +---+---+---+
 *   |   |   |   |
 *   +---+---+---+
 * y |   | H |   |
 *   +---+---+---+
 *   |   |   |   |
 *   +---+---+---+
 * </code>
 * @package Model\RangeStrategy
 */
class RangeStrategyW1 extends AbstractRangeStrategy implements IRangeStrategy {

    /** @var IRangeStrategy Our RangeStrategy Singleton instance  */
    private static $instance = null;

    /** Calculates the coordinates of the squares hit by the attack
     * @param $x int The x coordinate of the attack
     * @param $y int The y coordinate of the attack
     * @return int[] A list of Square objects hit by the attack
     */
    public function getInvolvedSquares($x, $y) {
        $squaresHit = array();

        array_push($squaresHit, array("x"=>$x, "y"=>$y));
        return $squaresHit;
    }

    /**
     * @return IRangeStrategy
     */
    public static function getInstance($dimensionX, $dimensionY) {

        $class = __CLASS__;
        if(self::$instance == null) {
            self::$instance = new $class;
        }

        return self::$instance;
    }
}