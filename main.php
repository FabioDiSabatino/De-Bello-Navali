<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 27/03/17
 * Time: 17.52
 */

    include("./Util/Autoloader.php");

    use Model\Weapon;
    use Model\Factories\RangeStrategyFactory\RangeStrategyFactory;
    use Model\Factories\FleetFactory\RomaniFleetFactory;


    $rangeFactory = RangeStrategyFactory::getInstance();

    $weapon = new Weapon(1,'W3');

    $arr = $weapon->attack(1,1);

    foreach ($arr as $squareHit) {
        echo "Ho colpito la casella x=".$squareHit["x"].", y=".$squareHit["y"]."<br>";
    }

    $fleet = new RomaniFleetFactory();

?>