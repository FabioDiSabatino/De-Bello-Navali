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
    use Persistence\ShipDescriptionPersistence\ShipCatalog;
    use Persistence\ShipDescriptionPersistence\ShipDescription;
    use Persistence\WeaponDescriptionPersistence\WeaponDescription;
    use Model\Battlefield;

//    Persistence\ShipDescriptionPersistence\ShipDescriptionQuery::create()->doDeleteAll();
//    Persistence\WeaponDescriptionPersistence\WeaponDescriptionQuery::create()->doDeleteAll();

    //startup
    $battlefield = new Battlefield();
    $fleetFactory = GameFactory::getInstance()->createFleetFactory('Galli');

    $battlefield->setFleetFactory($fleetFactory);

    $battlefield->addShipToField('Nave McBattelly', 0, 0, 'horizontal');

    $battlefield->addShipToField('Nave McBattelly', 1, 1, 'vertical');

    $battlefield->addShipToField('Nave McBattelly', 2, 5, 'vertical');

    $battlefield->addShipToField('Nave McBattelly', 4, 6, 'horizontal');

$battlefield->placeShips();

    $battlefield->disegnaCampo();


//    $battlefield->placeShip('Nave McBattelly', 2, 1, 'vertical');
//    $battlefield->placeShip('Nave McBattelly', 0, 1, 'horizontal');
//
//    $weaponDescription = new WeaponDescription();
//    $weaponDescription->setWeaponName('Colpo singolo');
//    $weaponDescription->setRangeName('W1');
//    $weaponDescription->setReloadTime(3);
//    $weaponDescription->setAmmo(99);
//
//    $weaponDescription->save();
//
//    $shipDescription = new ShipDescription();
//
//    $shipDescription->setCivilization('Bretoni');
//    $shipDescription->setShipName('Nave McBattelly');
//    $shipDescription->setDimension(3);
//    $shipDescription->setShipWeight(16);
//    $shipDescription->setWeapon1('Colpo singolo');
//    $shipDescription->setWeapon2('Colpo singolo');
//
//    $shipDescription->save();

    ?>