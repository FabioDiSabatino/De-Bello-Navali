<?php
/**
 * Created by PhpStorm.
 * User: Michele Iessi
 * Date: 27/03/17
 * Time: 17.52
 */


    require_once("vendor/autoload.php");
    require_once("generated-conf/config.php");

    include("Util/Autoloader.php");

    use Model\Catalogs\WeaponDescription;

    $weaponDescription = new WeaponDescription();

    \Persistence\WeaponDescriptionPersistence\WeaponDescriptionQuery::create()->doDeleteAll();

    $weaponDescription->setWeaponName('WeaponName');
    $weaponDescription->setRangeName('RangeName');
    $weaponDescription->setAmmo(1);
    $weaponDescription->setReloadTime(4);

    $weaponDescription->save();

    $weapon = \Persistence\WeaponDescriptionPersistence\WeaponDescriptionQuery::create()->findPk('WeaponName');

    echo $weapon->getWeaponName();

    ?>