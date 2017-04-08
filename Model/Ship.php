<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 17/03/17
 * Time: 22.55
 */

namespace Model;


class Ship {

    private $shipID = null;         // Identifies the single Ship Object
    private $integrity = null;      // The integrity of the ship, used to establish whether the ship can or cannot use its special weapon
    private $weaponList = array();  // A list of Weapons on the Ship


    public function __construct($id, $integrity = 100) {
        // gestire lo shipID
        $this->setShipID($id);
        $this->setIntegrity($integrity);
    }

    public function getWeaponList() {
        return $this->weaponList;
    }

    public function setWeaponList($weaponList) {
        $this->weaponList = $weaponList;
    }

    public function getShipID() {
        return $this->shipID;
    }

    public function setShipID($shipID) {
        $this->shipID = $shipID;
    }

    public function getIntegrity() {
        return $this->integrity;
    }

    public function setIntegrity($integrity) {
        $this->integrity = $integrity;
    }



}