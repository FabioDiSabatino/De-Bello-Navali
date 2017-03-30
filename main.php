<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 27/03/17
 * Time: 17.52
 */

    include("./Util/Autoloader.php");
    use Model\Battlefield;

    $batt = new Battlefield();
    $squareList = $batt->getField();
    $square = $squareList[3][2];
    $batt->placeShip("ciao",$square,1);
    var_dump($batt->getFleet());


?>