<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 31/03/17
 * Time: 10.27
 */

namespace Model\RangeStrategy;


interface IRangeStrategy {

    public function attack($x, $y);

    public static function getInstance();

}