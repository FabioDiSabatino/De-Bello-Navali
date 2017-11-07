<?php
/**
 * Created by PhpStorm.
 * User: Michele
 * Date: 06/11/2017
 * Time: 12:50
 */

namespace Persistence\WeaponDescriptionPersistence;


class WeaponCatalog {

    private static $instance;
    private static $weaponDescriptionQuery;

    private function __construct() {
        self::$weaponDescriptionQuery = WeaponDescriptionQuery::create();
    }

    public function getWeaponDescription($weaponName) {
        $desc = self::$weaponDescriptionQuery->findPk($weaponName);
        self::$weaponDescriptionQuery->clear();
        return $desc;
    }

    /**
     * @return WeaponCatalog
     */
    public static function getInstance() {

        if(self::$instance == null) {
            self::$instance = new WeaponCatalog();
        }

        return self::$instance;
    }

}