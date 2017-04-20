<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 20/04/17
 * Time: 11.13
 */

namespace Model\Catalogs;


class WeaponCatalog {

    private static $instance = null;

    public function getWeaponDescription($weaponName) {
        // Trovare la weapon dal DB tramite $weaponName e restituire un oggetto descrittore associato. Per ora restituisco un oggetto creato da me
        // TODO: implementare l'ORM Propel e gestire il recupero di descrizioni dal db
        return new WeaponDescription($weaponName, "W1", 1, 1);
    }

    public static function getInstance() {

        $class = __CLASS__;
        if(self::$instance == null) {
            self::$instance = new $class;
        }

        return self::$instance;
    }


}