<?php

namespace Php\Projetomvc\Models\Domain;

class Session{
    private $id;
    private Content $content;
    private Subject $subject;
    private $date;

    public function __construct($id, $content, $subject, $date){
        $this->setId($id);
        $this->setContent($content);
        $this->setSubject($subject);
        $this->setDate($date);
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getContent(){
        return $this->content;
    }

    public function setContent($content){
        $this->content = $content;
    }
    public function getSubject(){
        return $this->subject;
    }

    public function setSubject($subject){
        $this->subject = $subject;
    }

    public function getDate(){
        return $this->date;
    }

    public function setDate($date){
        $this->date = $date;
    }
}