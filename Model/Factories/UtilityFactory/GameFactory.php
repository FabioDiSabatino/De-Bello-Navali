<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 07/04/17
 * Time: 10.57
 */

namespace Model\Factories\UtilityFactory;


use Model\AmmoStorage;
use Model\Battlefield;
use Model\DeBelloGame;
use Model\Factories\FleetFactory\BretoniFleetFactory;
use Model\Factories\FleetFactory\FleetFactory;
use Model\Factories\FleetFactory\GalliFleetFactory;
use Model\Factories\FleetFactory\RomaniFleetFactory;
use Controller\PlaceShipMediator;
use Controller\PlayGameMediator;

class GameFactory {

    private static $instance = null;

    /** Creates and returns a DeBelloGame object that represents the specific Game
     * @return DeBelloGame
     */
    public function createDeBelloGame() {
        return new DeBelloGame();
    }

    /** Creates and returns a Battlefield object to be used in the specific Game
     * @return Battlefield
     */
    public function createBattlefield() {
        return new Battlefield();
    }

    /** Creates and returns an AmmoStorage object to be used in the specific Game
     * @return AmmoStorage
     */
    public function createAmmoStorage() {
        return new AmmoStorage();
    }

    /** Creates and returns a PlaceShipMediator which is a Mediator object in the placement phase of the Game
     * @return PlaceShipMediator
     */
    public function createPlaceShipMediator() {
        return new PlaceShipMediator();
    }

    /** Creates and returns a PlayGameMediator which is a Mediator object in the battle phase of the Game
     * @return PlayGameMediator
     */
    public function createPlayGameMediator() {
        return new PlayGameMediator();
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


    /* Singleton creator */

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