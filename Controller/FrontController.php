<?php
/**
 * Created by PhpStorm.
 * User: fabiodisabatino
 * Date: 27/06/17
 * Time: 11:00
 */


 class FrontController{


     private $controller=null;

     private $task=null;

     private $params=array();

     public function __construct(){

         $this->parseUri();
     }

     private function parseUri(){

         // parsifica url

         $path= explode("/",trim($_SERVER["REQUEST_URI"], "/"));
         $this->controller=$path[1];
         $this->task=explode("?",$path[2])[0];
         $this->params=$_GET;


}

public function run(){

    if (!$this->controller){
        //vai alla home page
    }
    else{
        $this->route();
    }

}


private function route(){

    if (file_exists("Controller/".$this->controller.".php")) {

        $this->controller = new $this->controller();

        if (method_exists($this->controller, $this->task)){

            if (!empty($this->params)){
                $this->controller->{$this->task}($this->params);
            }
            else
            {
                $this->controller->{$this->task}();
            }

        }
        else{
            echo "method not exist";
        }
    }
    else{
        echo "controller not found";
    }

}




}