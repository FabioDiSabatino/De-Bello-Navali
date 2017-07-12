<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 17/03/17
 * Time: 22.41
 */

namespace Model\Factories\FleetFactory;

use Model\Factories\WeaponFactory\WeaponFactory;
use Model\Ship;
use Persistence\ShipDescriptionPersistence\ShipCatalog;
use Persistence\ShipDescriptionPersistence\ShipDescription;


class GalliFleetFactory extends FleetFactory {

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

        $weaponFactory = WeaponFactory::getInstance();
        $weaponList = array();

        for($i = 1; $i <=3; $i++) {

            $functionName = "getWeapon". $i;
            if(($weaponName = call_user_func(array($shipDescription, $functionName))) != null) {

                $weapon = $weaponFactory->createWeapon($weaponName);
                array_push($weaponList, $weapon);
            }
        }

        $ship = new Ship();
        $ship->setWeaponList($weaponList);
        return $ship;
    }

    protected function createShip4($shipDescription) {

        // TODO: Implement createShip4() method.
    }

    /** Returns a GalliFleetFactory object
     * @return GalliFleetFactory
     */
    public static function getInstance() {

        $class = __CLASS__;
        if(self::$instance == null) {
            self::$instance = new $class;
        }

        return self::$instance;
    }

}