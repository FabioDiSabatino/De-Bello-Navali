<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 16/03/17
 * Time: 11.47
 */

namespace Model;

use Model\Fleet\Ship;


class Battlefield {

    private $fleet;
    private $field;
    private $fleetWeight;
    private $shipWeight;    // ?

    /* Funzioni di classe */

    /**
     * @param int $shipWeight
     * @return boolean
     */
    public function isPlaceable($shipWeight) {

        return ($this->fleetWeight >= $shipWeight);
    }

    /**
     * @param string $shipName
     * @param Square $position
     * @param int $orientation
     * @return int $id
     */
    public function placeShip($shipName, $position, $orientation) {

        //TODO: implementare placeShip
        $id = 0;
        return $id;
    }

    public function updateFleetWeight() {

    }

    /**
     * @param int $shipId
     * @param int $weaponID
     * @param Square $position
     */
    public function attack($shipId, $weaponID, $position) {

    }

    /**
     * @param Square $position
     */
    public function receiveAttack($position) {
        /*TODO: questa classe dovrà prendere come parametro una classe che modella
        il RANGE dell'arma o comunque bisogna trovare un modo di codificare il range */
    }
    /* Getter */
    /**
     * @return Ship[]
     */
    public function getFleet() { return $this->fleet; }
    /**
     * @return Square[]
     */
    public function getField() { return $this->field;}
    /**
     * @return int
     */
    public function getFleetWeight() { return $this->fleetWeight; }
    /**
     * @return int[]
     */
    public function getShipWeight() { return $this->shipWeight; }

    /* Setter */
    /**
     * @param Ship[] $fleet
     */
    public function setFleet($fleet) { $this->fleet = $fleet; }
    /**
     * @param Square[] $field
     */
    public function setField($field) { $this->field = $field; }
    /**
     * @param int $fleetWeight
     */
    public function setFleetWeight($fleetWeight) { $this->fleetWeight = $fleetWeight; }
    /**
     * @param int[] $shipWeight
     */
    public function setShipWeight($shipWeight) { $this->shipWeight = $shipWeight; }



}