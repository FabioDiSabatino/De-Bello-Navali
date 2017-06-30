<?php
/**
 * Created by PhpStorm.
 * User: fabiodisabatino
 * Date: 27/06/17
 * Time: 11:32
 */


class Cprova{

    private $task=null;
    private $message="task done";


    public function __construct()
    {

        echo "Cprova";
    }

    public function task1($msg){
        echo "hai scritto:".$msg["msg1"];
        echo "e anche:".$msg["msg2"];
    }

    public function task2(){
        echo $this->message;
    }




}