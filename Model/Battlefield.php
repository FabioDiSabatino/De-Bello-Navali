<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 16/03/17
 * Time: 11.47
 */

namespace Model;


class Battlefield {

    private static $shipIdCounter = 1;
    /** @var  Ship[] */
    private $fleet;
    private $field;
    private $fleetWeight;
    private $shipWeight;    //?

    public function __construct() {

        $this->setFleet(array());
        $this->setField($this->buildField());


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
    public function placeShip($shipName, $position, $orientation) { // per ora l'unica cosa che fa questo metodo è creare una Ship con uno shipID incrementale!

        //TODO: ricavare, dallo shipName, le informazioni relative alla nave inserita (specialmente la weaponList)
        //TODO: gestire la modifica delle Square sulle quali viene inserita la Ship
        $shipID = $this::$shipIdCounter;
        $ship = new Ship($shipID);
        if(array_push($this->fleet, $ship) == 1) {     // se è diverso da 1 vuol dire che c'è stato un errore nell'aggiunta della ship all'array fleet
            $this->increaseShipCounter();
        }
        return $shipID;
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


    /** Builds a matrix made of 64 Squares, which represents the battlefield
     * @return array A matrix made of 64 Squares
     */
    private function buildField() {

        $battleField = array();
        for($i=0; $i<8; $i++) {
            for($j=0; $j<8; $j++) {
                $battleField[$i][$j] = new Square();
            }
        }

        return $battleField;
    }



    private function increaseShipCounter() { $this::$shipIdCounter++; }


}