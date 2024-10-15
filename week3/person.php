<?php

abstract class Person
{
    private $first;
    private $last;
    private $ID;

    public function __construct($firstArg, $lastArg)
    {
        $this->first = $firstArg;
        $this->last = $lastArg;   
    }

    public function setFirst($firstArg){
        $this->first = $firstArg;
    }

    public function getFirst(){
        return $this->first;
    }

    public function setLast($lastArg){
        $this->first = $lastArg;
    }

    public function getLast(){
        return $this->last;
    }

    public function getID(){
        return $this->ID;
    }
}