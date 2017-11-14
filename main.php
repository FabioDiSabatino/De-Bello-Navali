<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 27/03/17
 * Time: 17.52
 */

    require_once("vendor/autoload.php");
    require_once("generated-conf/config.php");
    require_once("Util/Autoloader.php");

    use Model\Factories\UtilityFactory\GameFactory;
    use Persistence\ShipDescriptionPersistence\ShipDescription;
    use Persistence\WeaponDescriptionPersistence\WeaponDescription;
    use Model\Battlefield;
    use Persistence\WeaponDescriptionPersistence\WeaponCatalog;

//    Persistence\WeaponDescriptionPersistence\WeaponDescriptionQuery::create()->doDeleteAll();
//    Persistence\ShipDescriptionPersistence\ShipDescriptionQuery::create()->doDeleteAll();

    //startup
    $battlefield = GameFactory::getInstance()->createBattlefield();
    $fleetFactory = GameFactory::getInstance()->createFleetFactory('Galli');
    $ammoStorage = GameFactory::getInstance()->createAmmoStorage();

    $battlefield->setAmmoStorage($ammoStorage);
    $battlefield->setFleetFactory($fleetFactory);


    $battlefield->addShipToField('Nave McBattelly', 0, 0, 'horizontal');
    $battlefield->addShipToField('Nave McBattelly', 1, 1, 'vertical');
    $battlefield->addShipToField('Nave McBattelly', 2, 5, 'vertical');
    $battlefield->addShipToField('SuperNave', 4, 6, 'horizontal');

    $battlefield->placeShips();

    $battlefield->disegnaCampo();

    $battlefield->attack(3, "Quadrato", 1,1);
    $battlefield->attack(2, "Colpo singolo", 6, 5);
    var_dump($battlefield->getField()[1][1]);

    echo("<br/>");
    echo("<br/>");
    echo("<br/>");

    $battlefield->disegnaCampo();

//    $weaponDescription = new WeaponDescription();
//    $weaponDescription->setWeaponName('Colpo singolo');
//    $weaponDescription->setRangeName('W1');
//    $weaponDescription->setReloadTime(3);
//    $weaponDescription->setAmmo(99);
//    $weaponDescription->save();



//    $shipDescription = new ShipDescription();
//    $shipDescription->setCivilization("Bretoni");
//    $shipDescription->setShipName('Nave McBattelly');
//    $shipDescription->setDimension(3);
//    $shipDescription->setShipWeight(16);
//    $shipDescription->setWeapon1($weaponDescription->getWeaponName());
//    $shipDescription->setSecondWeapon(null);
//    $shipDescription->setThirdWeapon(null);
//
//    $shipDescription->save();


?>