<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 17/03/17
 * Time: 22.55
 */

namespace Model;


class Ship {

    private $shipID = null;
    private $position = null;
    private $orientation = null;

    /**
     * Ship constructor.
     * @param null $position
     * @param null $orientation
     */
    public function __construct($position, $orientation)
    {
        $this->position = $position;
        $this->orientation = $orientation;
    }

    /**
     * @return null
     */
    public function getShipID()
    {
        return $this->shipID;
    }

    /**
     * @param null $shipID
     */
    public function setShipID($shipID)
    {
        $this->shipID = $shipID;
    }

    /**
     * @return null
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param null $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return null
     */
    public function getOrientation()
    {
        return $this->orientation;
    }

    /**
     * @param null $orientation
     */
    public function setOrientation($orientation)
    {
        $this->orientation = $orientation;
    }



}