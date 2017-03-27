<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 16/03/17
 * Time: 11.47
 */

namespace Model;


class Battlefield {

    private $fleet;
    private $field;
    private $fleetWeight;
    private $shipWeight;    //?

    public function __construct() {

        $this->setFleet(array());
        $this->field = $this->buildField();


    }

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
        //TODO: Questo metodo dovrebbe capire se una nave è stata posizionata o tolta e calcolare il nuovo fleetWeight di conseguenza
        // Potrebbe quindi avere bisogno di due parametri di input (nave + azione)
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


    /**
     * @return array A matrix made of 64 squares, which indexes go from A to H and from 0 to 7;
     */
    private function buildField() {

        $battleField = array();
        for($i='A'; $i<'I'; $i++) {
            for($j=0; $j<8; $j++) {
                $battleField[$i][$j] = new Square();
            }
        }

        return $battleField;
    }




}