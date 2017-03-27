<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 23/03/17
 * Time: 11.40
 */

namespace Model;


class Weapon {

    /** @var int */
    private $weaponID;
    /** @var int */
    private $reloadTime;
    /** @var int */
    private $maxReloadTime;

    public function __construct($maxReload) {
        // bisognerebbe ricavare il descrittore e creare la weapon di conseguenza
        $this->maxReloadTime = $maxReload;
    }

    /**
     * @return int
     */
    public function getWeaponID() {
        return $this->weaponID;
    }

    /**
     * @param int $weaponID
     */
    public function setWeaponID($weaponID) {
        $this->weaponID = $weaponID;
    }

    /**
     * @return int
     */
    public function getReloadTime() {
        return $this->reloadTime;
    }

    /**
     * @param int $reloadTime
     */
    public function setReloadTime($reloadTime) {
        $this->reloadTime = $reloadTime;
    }

    /**
     * @return int
     */
    public function getMaxReloadTime() {
        return $this->maxReloadTime;
    }

    /**
     * @param int $maxReloadTime
     */
    public function setMaxReloadTime($maxReloadTime) {
        $this->maxReloadTime = $maxReloadTime;
    }

    /**
     * @return mixed
     */
    public function getWeaponRange() {
        return $this->weaponRange;
    }

    /**
     * @param mixed $weaponRange
     */
    public function setWeaponRange($weaponRange) {
        $this->weaponRange = $weaponRange;
    }



}