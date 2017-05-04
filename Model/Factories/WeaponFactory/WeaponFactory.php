<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 23/03/17
 * Time: 10.19
 */

namespace Model\Factories\WeaponFactory;

use Model\Weapon;


abstract class WeaponFactory {

    function createSimpleWeapon() { return new Weapon('W1'); } // dovrà essere l'arma da 1

    abstract function createWeaponShip2();
    abstract function createWeaponShip3();
    abstract function createWeaponShip4();

}