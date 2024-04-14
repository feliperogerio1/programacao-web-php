<?php

namespace Php\Projetomvc\Models\Domain;

class Tool{
    private $id;
    private Subject $subject;
    private $name;
    private $description;

    public function __construct($id, $subject, $name, $description){
        $this->setId($id);
        $this->setSubject($subject);
        $this->setName($name);
        $this->setDescription($description);
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


    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
        $this->description = $description;
    }
}