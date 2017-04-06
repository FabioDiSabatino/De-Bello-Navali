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

    $range1 = RangeStrategyFactory::createStrategyRange('W3');

    $weapon = new Weapon(1);
    $weapon->setRange($range1);

    $arr = $weapon->attack(7,1);



    foreach ($arr as $squareHit) {
        echo "Ho colpito la casella x=".$squareHit["x"].", y=".$squareHit["y"]."<br>";
    }

?>