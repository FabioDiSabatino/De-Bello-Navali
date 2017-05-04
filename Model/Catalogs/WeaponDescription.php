<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 20/04/17
 * Time: 11.15
 */

namespace Model\Catalogs;

use Persistence\WeaponDescriptionPersistence\Base\WeaponDescription as BaseWeaponDescription;


class WeaponDescription extends BaseWeaponDescription {

    protected $weaponName;
    protected $rangeName;
    protected $ammo;
    protected $reloadTime;


    public function __construct($weaponName="", $rangeName="", $ammo=0, $reloadTime=0) {

        parent::setWeaponName($weaponName);
        parent::setRangeName($rangeName);
        parent::setAmmo($ammo);
        parent::setReloadTime($reloadTime);

    }

    /**
     * @return string
     */
    public function getWeaponName() {
        return parent::getWeaponName();
    }

    /**
     * @param string $weaponName
     */
    public function setWeaponName($weaponName) {
        parent::setWeaponName($weaponName);
    }

    /**
     * @return string
     */
    public function getRangeName() {
        return parent::getRangeName();
    }

    /**
     * @param string $rangeName
     */
    public function setRangeName($rangeName) {
        parent::setRangeName($rangeName);
    }

    /**
     * @return int
     */
    public function getAmmo() {
        return parent::getAmmo();
    }

    /**
     * @param int $ammo
     */
    public function setAmmo($ammo) {
        parent::setAmmo($ammo);
    }

    /**
     * @return int
     */
    public function getReloadTime() {
        return parent::getReloadTime();
    }

    /**
     * @param int $reloadTime
     */
    public function setReloadTime($reloadTime) {
        parent::setReloadTime($reloadTime);
    }

}