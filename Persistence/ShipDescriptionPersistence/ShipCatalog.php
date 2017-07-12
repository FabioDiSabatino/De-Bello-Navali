<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 09/05/2017
 * Time: 15:48
 */

namespace Persistence\ShipDescriptionPersistence;


class ShipCatalog {

    private static $instance;
    private static $shipDescriptionQuery;

    private function __construct() {
        self::$shipDescriptionQuery = ShipDescriptionQuery::create();
    }


    public function getShipDescription($civilization, $dimension) {
        return self::$shipDescriptionQuery->findPk(array($civilization, $dimension));
    }

    public function getShipDescriptionByShipname($shipName) {
        $desc =  self::$shipDescriptionQuery->findOneByShipName($shipName);
        self::$shipDescriptionQuery->clear();
        return $desc;
    }

    /**
     * @return ShipCatalog
     */
    public static function getInstance() {

        $class = __CLASS__;
        if(self::$instance == null) {
            self::$instance = new $class;
        }

        return self::$instance;
    }

}