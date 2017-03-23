<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 17/03/17
 * Time: 22.52
 */

namespace Model\Turn;


class Square {

    private $hit = false;
    private $empty = false;

    /**
     * Square constructor.
     */
    public function __construct(){}


    /**
     * @return bool
     */
    public function isHit()
    {
        return $this->hit;
    }

    /**
     * @param bool $hit
     */
    public function setHit($hit)
    {
        $this->hit = $hit;
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return $this->empty;
    }

    /**
     * @param bool $empty
     */
    public function setEmpty($empty)
    {
        $this->empty = $empty;
    }


}