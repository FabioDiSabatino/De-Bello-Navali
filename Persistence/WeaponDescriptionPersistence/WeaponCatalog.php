<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 20/04/17
 * Time: 11.13
 */

namespace Persistence\WeaponDescriptionPersistence;


use Persistence\WeaponDescriptionPersistence\WeaponDescriptionQuery;

class WeaponCatalog {

    private static $instance;
    private static $weaponDescriptionQuery;

    private function __construct() {
        self::$weaponDescriptionQuery = WeaponDescriptionQuery::create();
    }

    public function getWeaponDescription($weaponName) {
        $desc =  self::$weaponDescriptionQuery->findPk($weaponName);
        self::$weaponDescriptionQuery->clear();
        return $desc;
    }

    /**
     * @return WeaponCatalog
     */
    public static function getInstance() {

        $class = __CLASS__;
        if(self::$instance == null) {
            self::$instance = new $class;
        }

        return self::$instance;
    }

}