<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 17/03/17
 * Time: 22.44
 */

namespace Model\Factories\FleetFactory;

use Model\Factories\WeaponFactory\WeaponFactory;
use Model\Ship;
use Persistence\ShipDescriptionPersistence\ShipCatalog;
use Persistence\ShipDescriptionPersistence\ShipDescription;


class BretoniFleetFactory extends FleetFactory {

    private static $instance = null;
    private $weaponFactory = null;

    private function __construct() {
        $this->weaponFactory = WeaponFactory::getInstance();
    }

    /**
     * @param string $shipName
     * @return Ship|null
     */
    public function createShip($shipName) {

        $shipCatalog = ShipCatalog::getInstance();
        $shipDescription = $shipCatalog->getShipDescriptionByShipname($shipName);
        $dimension = $shipDescription->getDimension();
        $functionName = "createShip$dimension";

        if(method_exists(self::class, $functionName)) {
            return call_user_func(array(self::class, $functionName), $shipDescription);
        }
        return null;

    }

    protected function createShip2($shipDescription) {

        // TODO: Implement createShip2() method.
    }

    protected function createShip3($shipDescription) {

        // TODO: Implement createShip3() method.
        // Per esempio la nave da 3 ha solamente l'arma W1
        $ship = new Ship();

    }

    protected function createShip4($shipDescription) {

        // TODO: Implement createShip4() method.
    }

    /** Returns a BretoniFleetFactory object
     * @return BretoniFleetFactory
     */
    public static function getInstance() {

        $class = __CLASS__;
        if(self::$instance == null) {
            self::$instance = new $class;
        }

        return self::$instance;
    }

}