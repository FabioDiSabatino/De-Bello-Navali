<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 27/03/17
 * Time: 17.52
 */

    include("./Util/Autoloader.php");

    use Model\Factories\UtilityFactory\GameFactory;


    $gameFactory = new GameFactory();
    $ammoStorage = $gameFactory->createAmmoStorage();
    $ammoStorage->insertAmmo("Ciao");
    $ammoStorage->insertAmmo("bulabula");

    var_dump($ammoStorage->getAmmo());

    $ammoStorage->decreaseAmmo("Ciao");

    var_dump($ammoStorage->getAmmo());


?>