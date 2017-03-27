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
    private $position = null;       // The position of the upper-left most Square of the Ship
    private $orientation = null;    // The orientation of the ship (horizontal or vertical)
    private $integrity = null;       // The integrity of the ship, used to establish whether the ship can or cannot use its special weapon


    public function __construct($position, $orientation, $integrity = 100) {
        // gestire lo shipID
        $this->setPosition($position);
        $this->setOrientation($orientation);
        $this->setIntegrity($integrity);
    }

    public function getShipID() {
        return $this->shipID;
    }

    public function setShipID($shipID) {
        $this->shipID = $shipID;
    }

    public function getPosition() {
        return $this->position;
    }

    public function setPosition($position) {
        $this->position = $position;
    }

    public function getOrientation() {
        return $this->orientation;
    }

    public function setOrientation($orientation) {
        $this->orientation = $orientation;
    }

    public function getIntegrity() {
        return $this->integrity;
    }

    public function setIntegrity($integrity) {
        $this->integrity = $integrity;
    }



}