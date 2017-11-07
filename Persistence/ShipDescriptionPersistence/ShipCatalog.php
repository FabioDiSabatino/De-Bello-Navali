<?php
/**
 * Created by PhpStorm.
 * User: Michele
 * Date: 06/11/2017
 * Time: 13:12
 */

namespace Persistence\ShipDescriptionPersistence;

use Persistence\ShipDescriptionPersistence\ShipDescriptionQuery;

class ShipCatalog {

    private static $instance;
    private static $shipDescriptionQuery;

    private function __construct() {
        self::$shipDescriptionQuery = ShipDescriptionQuery::create();
    }

    public function getShipDescription($civilization, $dimension) {
        $desc =  self::$shipDescriptionQuery->findPk(array($civilization, $dimension));
        self::$shipDescriptionQuery->clear();
        return $desc;
    }

    public function getShipDescriptionByShipname($shipname) {
        $desc = self::$shipDescriptionQuery->findOneByShipname($shipname);
        self::$shipDescriptionQuery->clear();
        return $desc;
    }

    /**
     * @return ShipCatalog
     */
    public static function getInstance() {

        if(self::$instance == null) {
            self::$instance = new ShipCatalog();
        }

        return self::$instance;
    }

}