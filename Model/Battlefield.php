<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 16/03/17
 * Time: 11.47
 */

namespace Model;


use Model\Factories\FleetFactory\FleetFactory;
use Persistence\ShipDescriptionPersistence\ShipCatalog;

class Battlefield {

    /** @var int Used to initialize new ships' IDs */
    private static $shipIdCounter = 1;

    /** @var  Ship[] Contains already created Ship objects */
    private $fleet;

    /** @var  Square[][] The actual battlefield made of Square objects */
    private $field;

    /** @var  int The remaining amount of Ship weight available for new Ship objects */
    private $fleetWeight;

    /** @var  int The combined actual amount of Ship weights */
    private $shipWeight;    //?

    /** @var  FleetFactory The FleetFactory that will create the Ship objects */
    private $fleetFactory;

    /** @var  array(int, string) An array used to store information regarding Ship objects that are to be still created */
    private $supportFleet;

    public function __construct($fleetWeight = 70) {

        $this->setFleetWeight($fleetWeight);
        $this->setShipWeight(0);    // il campo è vuoto
        $this->setFleet(array());
        $this->setField($this->buildField());
    }

    /* Class functions */

    /** Checks if a Ship is placeable (by its own weight)
     * @param int $shipWeight The weight of the ship
     * @return boolean true if the ship is placeable, false otherwise
     */
    public function isPlaceable($shipWeight) {
        return ($shipWeight <= ($this->fleetWeight - $this->shipWeight));
    }

    /** Tries to add a Ship to the battlefield. The actual Ship object will be created by method 'placeShips'
     * @param $shipName
     * @param $positionX
     * @param $positionY
     * @param $orientation
     * @return boolean true if the Ship has been added, false otherwise
     */
    public function addShipToField($shipName, $positionX, $positionY, $orientation) {
        // è un array di supporto che la funzione userà in caso sia possibile inserire la nave all'interno del campo di battaglia
        /** @var Square[] $squaresToBePlaced */
        echo "Provo a piazzare una nave " . $shipName . "<br>";
        $squaresToBePlaced = array();
        $shipCatalog = ShipCatalog::getInstance();
        $shipDescription = $shipCatalog->getShipDescriptionByShipname($shipName); // ricavo il descrittore a partire dal nome della nave
        $shipWeight = $shipDescription->getShipWeight();    // ricavo il peso dal descrittore appena ricavato

        // SE la nave è piazzabile, ossia se c'è abbastanza peso ancora disponibile, allora controllo se è inseribile all'interno del campo di battaglia
        if ($this->isPlaceable($shipWeight)) {

            // ricavo la dimensione della nave da piazzare, ossia il numero di Squares che occupa
            $shipDimension = $shipDescription->getDimension();

            // Se l'utente vuole piazzare la nave in orizzontale, controllo le caselle a destra da quella di partenza
            if ($orientation == "horizontal") {
                for ($i = $positionX; $i < $positionX + $shipDimension; $i++) {
                    $square = $this->getField()[$i][$positionY];
                    if (!$square->isEmpty()) {
                        echo "Non posso piazzare la nave " . $shipName . " (dimensione=" . $shipDimension . ")
                         in posizione (" . $positionX . "," . $positionY . "), c'è "
                            . "già un'altra nave con id " . $square->getShipReference() . " in (" . $i . "," . $positionY . ")<br>";
                        $squaresToBePlaced = array();   // svuoto l'array di squares
                        return false;
                    } else {
                        echo "La nave è piazzabile in posizione (" . $i . "," . $positionY . ")<br>";
                        array_push($squaresToBePlaced, $square);
                    }
                }
            } // Se l'utente vuole piazzare la nave in verticale, controllo le caselle sotto quella di partenza
            else if ($orientation == "vertical") {
                for ($i = $positionY; $i < $positionY + $shipDimension; $i++) {
                    $square = $this->getField()[$positionX][$i];
                    if (!$square->isEmpty()) {
                        echo "Non posso piazzare la nave " . $shipName . " (dimensione=" . $shipDimension . ") in posizione (" . $positionX . "," . $positionY . "), c'è "
                            . "già un'altra nave con id " . $square->getShipReference() . " in (" . $positionX . "," . $i . ")<br>";
                        $squaresToBePlaced = array();
                        return false;
                    } else {
                        echo "La nave è piazzabile in posizione (" . $positionX . "," . $i . ")<br>";
                        array_push($squaresToBePlaced, $square);
                    }
                }
            }

            // Se arrivo a questo punto vuol dire che i due check sono andati a buon fine. Ora posso aggiungere la Ship al campo di battaglia.
            // Modifico gli attributi di ogni Square su cui è stata posizionata la nave
            $shipID = self::$shipIdCounter;
            foreach ($squaresToBePlaced as $square) {
                $square->setEmpty(false);
                $square->setShipReference($shipID);
            }
        }
        $this->supportFleet[self::$shipIdCounter] = $shipName;
        $this->increaseShipCounter();
        return true;
    }

    /** Creates the Ship objects and assigns them to the Battlefield
     */
    public function placeShips() {

        $supportFleet = $this->getSupportFleet();
        foreach ($supportFleet as $shipID => $shipName) {

            $ship = $this->getFleetFactory()->createShip($shipName);
            $ship->setShipID($shipID);

            array_push($this->fleet, $ship);
        }

        $this->setSupportFleet(array());
    }


    public function addShipWeight($shipWeight) {
        $this->setShipWeight($this->getShipWeight() + $shipWeight);
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

    }
    /* Getter */

    /**
     * @return Ship[]
     */
    public function getFleet() { return $this->fleet; }

    /**
     * @return Square[][]
     */
    public function getField() { return $this->field;}

    /**
     * @return int
     */
    public function getFleetWeight() { return $this->fleetWeight; }

    /**
     * @return int
     */
    public function getShipWeight() { return $this->shipWeight; }

    /**
     * @return FleetFactory
     */
    public function getFleetFactory() { return $this->fleetFactory; }

    /**
     * @return array
     */
    public function getSupportFleet() { return $this->supportFleet; }

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
     * @param int $shipWeight
     */
    public function setShipWeight($shipWeight) { $this->shipWeight = $shipWeight; }

    /**
     * @param $fleetFactory
     */
    public function setFleetFactory($fleetFactory) { $this->fleetFactory = $fleetFactory; }

    /**
     * @param $supportFleet
     */
    public function setSupportFleet($supportFleet) { $this->supportFleet = $supportFleet; }

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