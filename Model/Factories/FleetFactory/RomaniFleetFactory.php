<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 17/03/17
 * Time: 22.43
 */

namespace Model\Factories\FleetFactory;

use Model\Factories\WeaponFactory\RomaniWeaponFactory;


class RomaniFleetFactory extends FleetFactory {

    private static $instance = null;
    private $weaponFactory = null;

    private function __construct() {
        $weaponFactoryName = str_replace('Fleet','Weapon',__CLASS__);
        $this->weaponFactory = new $weaponFactoryName;
        var_dump($this->weaponFactory);
    }

    protected function createShip2() {

        // TODO: Implement createShip2() method.
    }

    protected function createShip3() {

        // TODO: Implement createShip3() method.
    }

    protected function createShip4() {

        // TODO: Implement createShip4() method.
    }

    /** Returns a RomaniFleetFactory object
     * @return RomaniFleetFactory
     */
    public static function getInstance() {

        $class = __CLASS__;
        if(self::$instance == null) {
            self::$instance = new $class;
        }

        return self::$instance;
    }

}