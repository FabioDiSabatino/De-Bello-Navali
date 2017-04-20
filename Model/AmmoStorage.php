<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 20/04/17
 * Time: 10.47
 */

namespace Model;


use Model\Catalogs\WeaponCatalog;
use Model\Catalogs\WeaponDescription;

class AmmoStorage {

    private static $instance = null;
    /**
     * @var WeaponCatalog
     */
    private $weaponCatalog; // riferimento all'oggetto WeaponCatalog (in singleton)
    private $ammo;

    private function __construct() {
        $this->setWeaponCatalog(WeaponCatalog::getInstance());
        $this->ammo = array();
    }

    public function getAmmo() {
        return $this->ammo;
    }

    public function isFirable($weaponName) {
        return $this->ammo[$weaponName] > 0;
    }

    /**
     * @param $weaponName string The weapon name of the weapon whose ammo are to be added to the Storage
     */
    public function insertAmmo($weaponName) {
        // Qui si deve recuperare il descrittore della Weapon e aggiungere a $ammo una entry del tipo
        // [$weaponName] => munizioni
        if (!array_key_exists($weaponName, $this->ammo)) { // se ho già aggiunto le munizioni per una specifica arma non devo riaggiungerle
            /** @var WeaponDescription $description */
            $description = $this->weaponCatalog->getWeaponDescription($weaponName);
            $ammunitions = $description->getAmmo();
            $this->ammo[$weaponName] = $ammunitions;
        }
    }

    /** Decreases the ammo of the weapon by 1, if the weapon is into the Storage
     * @param $weaponName string The weapon name of the weapon which ammo are to be decreased
     */
    public function decreaseAmmo($weaponName) {
        if (array_key_exists($weaponName, $this->ammo)) {
            if ($this->ammo[$weaponName] > 0) {
                $this->ammo[$weaponName] = $this->ammo[$weaponName] - 1;
            }
        }
    }

    private function setWeaponCatalog($weaponCatalog) {
        $this->weaponCatalog = $weaponCatalog;
    }


    public static function getInstance() {

        $class = __CLASS__;
        if(self::$instance == null) {
            self::$instance = new $class;
        }

        return self::$instance;
    }


}