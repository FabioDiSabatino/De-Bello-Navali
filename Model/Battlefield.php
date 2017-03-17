<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 16/03/17
 * Time: 11.47
 */

namespace Model;


class Battlefield {

    private $idField;
    private $fleetWeight;
    private $squareList;

    /**
     * @return mixed
     */
    public function getIdField()
    {
        return $this->idField;
    }

    /**
     * @param mixed $idField
     */
    public function setIdField($idField)
    {
        $this->idField = $idField;
    }

    /**
     * @return mixed
     */
    public function getFleetWeight()
    {
        return $this->fleetWeight;
    }

    /**
     * @param mixed $fleetWeight
     */
    public function setFleetWeight($fleetWeight)
    {
        $this->fleetWeight = $fleetWeight;
    }

    /**
     * @return mixed
     */
    public function getSquareList()
    {
        return $this->squareList;
    }

    /**
     * @param mixed $squareList
     */
    public function setSquareList($squareList)
    {
        $this->squareList = $squareList;
    }


}