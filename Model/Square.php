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

    public function __construct() {}


    public function isHit(){

        return $this->hit;
    }

    public function setHit($hit) {

        $this->hit = $hit;
    }

    public function isEmpty() {

        return $this->empty;
    }

    public function setEmpty($empty) {

        $this->empty = $empty;
    }


}