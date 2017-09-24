<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 20/04/17
 * Time: 10.47
 */

namespace Model;


use \Persistence\WeaponDescriptionPersistence\WeaponCatalog;
use \Persistence\WeaponDescriptionPersistence\WeaponDescription;

class AmmoStorage {

    /** @var WeaponCatalog A WeaponCatalog reference */
    private $weaponCatalog;
    /** @var array The list of ammunitions for the Weapon of the Ships in the Battlefield */
    private $ammo;

    public function __construct() {
        $this->setWeaponCatalog(WeaponCatalog::getInstance());
        $this->ammo = array();
    }

    public function getAmmo() {
        return $this->ammo;
    }

    public function isFireable($weaponName) {
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

    public function getAmmoByWeaponName($weaponName) {
        if(array_key_exists($weaponName,$this->ammo)){
            $ammunitions=$this->ammo[$weaponName];
            return $ammunitions;
        }
        else return 0;
    }

    private function setWeaponCatalog($weaponCatalog) {
        $this->weaponCatalog = $weaponCatalog;
    }



}