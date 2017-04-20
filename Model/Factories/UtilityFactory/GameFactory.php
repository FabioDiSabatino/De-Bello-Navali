<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 07/04/17
 * Time: 10.57
 */

namespace Model\Factories\UtilityFactory;


use Model\AmmoStorage;
use Model\Factories\FleetFactory\BretoniFleetFactory;
use Model\Factories\FleetFactory\FleetFactory;
use Model\Factories\FleetFactory\GalliFleetFactory;
use Model\Factories\FleetFactory\RomaniFleetFactory;

class GameFactory {

    private static $instance = null;

    /** Creates and returns an AmmoStorage object to be used in the specific Game
     * @return AmmoStorage
     */
    public function createAmmoStorage() {

        return AmmoStorage::getInstance();
    }

    /**
     * @param string $civilizationName The civilization name of the FleetFactory to be created
     * @return FleetFactory|null The FleetFactory to be created, if it exists, or null if it doesn't.
     */
    public function createFleetFactory($civilizationName) {

        $functionName = "create" . $civilizationName . "FleetFactory";
        if(method_exists(self::class, $functionName)) {
            return call_user_func(array(self::class, $functionName));
        }
        return null;
    }

    /* FleetFactory creators */

    /** Creates and returns a FleetFactory for the 'Galli' civilization
     * @return GalliFleetFactory
     */
    private function createGalliFleetFactory() {

        return GalliFleetFactory::getInstance();
    }

    /** Creates and returns a FleetFactory for the 'Romani' civilization
     * @return RomaniFleetFactory
     */
    private function createRomaniFleetFactory() {

        return RomaniFleetFactory::getInstance();
    }

    /** Creates and returns a FleetFactory for the 'Bretoni' civilization
     * @return BretoniFleetFactory
     */
    private function createBretoniFleetFactory() {

        return BretoniFleetFactory::getInstance();
    }

    /** Returns an (unique) instance of this class
     * @return GameFactory
     */
    public static function getInstance() {

        $class = __CLASS__;
        if(self::$instance == null) {
            self::$instance = new $class;
        }

        return self::$instance;
    }


}