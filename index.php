<?php
/**
 * Created by PhpStorm.
 * User: fabiodisabatino
 * Date: 27/06/17
 * Time: 10:51
 */

require_once "Model/Controller/FrontController.php";

require_once "util/Autoloader.php";

$router=new FrontController();
$router->run();



