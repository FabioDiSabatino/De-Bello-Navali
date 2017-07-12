<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 06/04/17
 * Time: 12.15
 */

namespace Model\RangeStrategy;


/**
 * Class RangeStrategyW1 models the three Squares horizontal attack.
 * <code>
 *         x
 *   +---+---+---+
 *   |   |   |   |
 *   +---+---+---+
 * y | H | H | H |
 *   +---+---+---+
 *   |   |   |   |
 *   +---+---+---+
 * </code>
 * @package Model\RangeStrategy
 */
class RangeStrategyW2 extends AbstractRangeStrategy implements IRangeStrategy {

    /** @var IRangeStrategy Our RangeStrategy Singleton instance  */
    private static $instance = null;

    public function getInvolvedSquares($x, $y) {
        $squaresHit = array();
        $dimX = $this->getDimensionX();

        array_push($squaresHit, array("x"=>$x,"y"=>$y));        // inserisco il centro dell'attacco tra le squares colpite

        if(($x-1)>=0) {
            array_push($squaresHit, array("x"=>$x-1,"y"=>$y));  // inserisco la square a sinistra del centro
        }

        if(($x+1)<=$dimX) {
            array_push($squaresHit, array("x"=>$x+1,"y"=>$y));   // inserisco la square a destra del centro
        }

        return $squaresHit;

    }

    /**
     * @return IRangeStrategy
     */
    public static function getInstance($dimensionX, $dimensionY) {

        $class = __CLASS__;
        if(self::$instance == null) {
            self::$instance = new $class($dimensionX, $dimensionY);
        }

        return self::$instance;
    }
}