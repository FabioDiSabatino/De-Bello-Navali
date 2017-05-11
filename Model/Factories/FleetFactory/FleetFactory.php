<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 17/03/17
 * Time: 22.39
 */

namespace Model\Factories\FleetFactory;


use Model\Ship;
use Persistence\ShipDescriptionPersistence\ShipDescription;

abstract class FleetFactory {

    /**
     * @param ShipDescription $dimension
     * @return Ship
     */
    abstract public function createShip($shipDescription);
    /**
     * @return Ship
     */
    abstract protected function createShip2($shipDescription);
    /**
     * @return Ship
     */
    abstract protected function createShip3($shipDescription);
    /**
     * @return Ship
     */
    abstract protected function createShip4($shipDescription);

}