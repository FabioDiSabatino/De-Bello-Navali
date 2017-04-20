<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 20/04/17
 * Time: 11.15
 */

namespace Model\Catalogs;


class WeaponDescription {

    private $weaponName;
    private $rangeName;
    private $ammo;
    private $reloadTime;


    public function __construct($weaponName, $rangeName, $ammo, $reloadTime) {

        $this->setWeaponName($weaponName);
        $this->setRangeName($rangeName);
        $this->setAmmo($ammo);
        $this->setReloadTime($reloadTime);

    }

    /**
     * @return string
     */
    public function getWeaponName() {
        return $this->weaponName;
    }

    /**
     * @param string $weaponName
     */
    public function setWeaponName($weaponName) {
        $this->weaponName = $weaponName;
    }

    /**
     * @return string
     */
    public function getRangeName() {
        return $this->rangeName;
    }

    /**
     * @param string $rangeName
     */
    public function setRangeName($rangeName) {
        $this->rangeName = $rangeName;
    }

    /**
     * @return int
     */
    public function getAmmo() {
        return $this->ammo;
    }

    /**
     * @param int $ammo
     */
    public function setAmmo($ammo) {
        $this->ammo = $ammo;
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

}