<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 23/03/17
 * Time: 11.40
 */

/**
 * The Weapon class models a Weapon object mounted on a Ship. A Weapon can perform attacks, and has a RangeStrategy
 * that specifies how it hits the Battlefield. It also has a current reload time (used to check if the Weapon is ready
 * to fire) and a maximum reload time.
 */
namespace Model;

use Model\Factories\RangeStrategyFactory\RangeStrategyFactory;
use Model\RangeStrategy\IRangeStrategy;


/**
 * The Weapon class models a Weapon object mounted on a Ship. A Weapon can perform attacks, and has a RangeStrategy
 * that specifies how it hits the Battlefield. It also has a current reload time (used to check if the Weapon is ready
 * to fire) and a maximum reload time.
 *
 * @package Model
 */
class Weapon {

    /** @var string The name of the Weapon */
    private $weaponName;
    /** @var int The identifier of the Weapon object */
    private $weaponID;
    /** @var int The current remaining reload time of the Weapon object */
    private $reloadTime;
    /** @var int The maximum reload time of the Weapon object*/
    private $maxReloadTime;
    /** @var  IRangeStrategy The RangeStrategy object indicates how the Weapon performs its attacks */
    private $range;
    /** @var  string The name of the RangeStrategy of the Weapon object */
    private $rangeName;


    /* -- Constructor -- */


    /**
     * Weapon constructor.
     * @param $maxReload
     */
    public function __construct($weaponName, $rangeName, $maxReload = 0, $reloadTime = 0) {
        $this->setMaxReloadTime($maxReload);
        $this->setRangeName($rangeName);
        $this->setReloadTime($reloadTime);
        $this->setWeaponName($weaponName);
        $rangeStrategyFactory = RangeStrategyFactory::getInstance();
        $this->setRange($rangeStrategyFactory->createStrategyRange($this->rangeName));
    }


    /* -- Getter & Setter Methods -- */

    /** Returns the name of thw Weapon object
     * @return string The name of the Weapon object
     */
    public function getWeaponName() {
        return $this->weaponName;
    }

    /** Sets the name of the Weapon object to the given parameter
     * @param string $weaponName The Weapon name to be set on the Weapon object
     */
    public function setWeaponName($weaponName) {
        $this->weaponName = $weaponName;
    }
    /** Returns the identifier of the Weapon object
     * @return int The Weapon ID of the Weapon object
     */
    public function getWeaponID() {
        return $this->weaponID;
    }

    /** Sets the identifier of the Weapon object to the given parameter
     * @param int $weaponID The Weapon ID to be set on the Weapon object
     */
    public function setWeaponID($weaponID) {
        $this->weaponID = $weaponID;
    }

    /** Returns the (current) remaining reload time of the Weapon object. It returns 0 if the Weapon is ready to fire
     * @return int The remaining reload time of the Weapon object
     */
    public function getReloadTime() {
        return $this->reloadTime;
    }

    /** Sets the remaining reload time of the Weapon object to the given parameter
     * @param int $reloadTime The (current) reload time to be set on the Weapon object
     */
    public function setReloadTime($reloadTime) {
        $this->reloadTime = $reloadTime;
    }

    /** Returns the maximum reload time of the Weapon object. This does not depend on the Weapon object itself, it depends on his descriptor
     * @return int The maximum reload time of the Weapon object
     */
    public function getMaxReloadTime() {
        return $this->maxReloadTime;
    }

    /** Sets the maximum reload time of the Weapon object to the given parameter
     * @param int $maxReloadTime The maximimum
     */
    public function setMaxReloadTime($maxReloadTime) {
        $this->maxReloadTime = $maxReloadTime;
    }

    /** Returns the RangeStrategy of the Weapon object
     * @return IRangeStrategy The RangeStrategy object of the Weapon
     */
    public function getRange() {
        return $this->range;
    }

    /** Sets the RangeStrategy of the Weapon object to the given parameter
     * @param IRangeStrategy $range The RangeStrategy to be set on the Weapon object
     */
    public function setRange($range) {
        $this->range = $range;
    }

    /** Returns the name of the RangeStrategy of the Weapon object
     * @return string The name of the RangeStrategy of the Weapon object
     */
    public function getRangeName() {
        return $this->rangeName;
    }

    /** Sets the name of the RangeStrategy of the Weapon object to the given parameter
     * @param string $rangeName The name to be set on the RangeStrategy of the Weapon object
     */
    public function setRangeName($rangeName) {
        $this->rangeName = $rangeName;
    }


    /* -- Class Specific Methods -- */

    /**
     * @param AmmoStorage $ammoStorage
     */
    public function isFirable() {
        return ($this->reloadTime == 0);
    }

    /** Performs an attack
     * @param $x int The x coordinate of the attack
     * @param $y int The y coordinate of the attack
     * @return int[] A list of Square objects hit by the attack
     */
    public function attack($x, $y) {

        return $this->getRange()->getInvolvedSquares($x, $y); // by Strategy pattern
    }


}