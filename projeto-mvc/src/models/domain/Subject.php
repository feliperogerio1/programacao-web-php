<?php

namespace Php\Projetomvc\Models\Domain;

class Subject{
    private $id;
    private $name;
    private $datep1;
    private $datep2;

    public function __construct($id, $name, $datep1, $datep2){
        $this->setId($id);
        $this->setName($name);
        $this->setDatep1($datep1);
        $this->setDatep2($datep2);
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getDatep1(){
        return $this->datep1;
    }

    public function setDatep1($datep1){
        $this->datep1 = $datep1;
    }

    public function getDatep2(){
        return $this->datep2;
    }

    public function setDatep2($datep2){
        $this->datep2 = $datep2;
    }
}