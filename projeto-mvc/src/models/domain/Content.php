<?php

namespace Php\Projetomvc\Models\Domain;

class Content{
    private $id;
    private Subject $subject;
    private $name;
    private $weight;

    public function __construct($id, $subject, $name, $weight){
        $this->setId($id);
        $this->setSubject($subject);
        $this->setName($name);
        $this->setWeight($weight);
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getSubject(){
        return $this->subject;
    }

    public function setSubject($subject){
        $this->subject = $subject;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }


    public function getWeight(){
        return $this->weight;
    }

    public function setWeight($weight){
        $this->weight = $weight;
    }
}