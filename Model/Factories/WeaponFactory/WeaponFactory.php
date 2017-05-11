<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 23/03/17
 * Time: 10.19
 */

namespace Model\Factories\WeaponFactory;

use Model\Weapon;
use Persistence\WeaponDescriptionPersistence\WeaponCatalog;


class WeaponFactory {

    private static $instance = null;

    protected static $weaponId = 1;

    /** Creates a Weapon object
     * @param string $weaponName
     * @return Weapon
     */
    function createWeapon($weaponName) {

        $weaponCatalog = WeaponCatalog::getInstance();
        $weaponDescription = $weaponCatalog->getWeaponDescription($weaponName);

        $weaponRangeName = $weaponDescription->getRangeName();
        $weaponReloadTime = $weaponDescription->getReloadTime();

        //TODO: Comunicare con l'ammostorage e inserire informazioni relative alle munizioni (se non sono già presenti)

        $weapon = new Weapon($weaponRangeName, $weaponReloadTime);
        $weapon->setWeaponID(self::getWeaponID());
        self::incrementWeaponID();

        return $weapon;
    }

    protected static function getWeaponID() {
        return self::$weaponId;
    }

    protected static function incrementWeaponID() {
        self::$weaponId += 1;
    }

    /** Returns a GalliFleetFactory object
     * @return WeaponFactory
     */
    public static function getInstance() {

        $class = __CLASS__;
        if(self::$instance == null) {
            self::$instance = new $class;
        }

        return self::$instance;
    }


}