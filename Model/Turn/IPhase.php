<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 17/03/17
 * Time: 22.45
 */

namespace Model\Turn;


interface IPhase {

    public function initPhase();
    public function nextPhase();
}