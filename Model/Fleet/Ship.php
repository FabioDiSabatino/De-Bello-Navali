<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 17/03/17
 * Time: 22.55
 */

namespace Model\Fleet;


class Ship {

    private $shipID = null;         // Identifies the single Ship Object
    private $position = null;       // The position of the upper-left most Square of the Ship
    private $orientation = null;


    public function __construct($position, $orientation) {

        $this->position = $position;
        $this->orientation = $orientation;
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



}