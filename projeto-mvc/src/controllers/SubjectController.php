<?php

namespace Php\Projetomvc\Controllers;

use Php\Projetomvc\Models\DAO\SubjectDAO;
use Php\Projetomvc\Models\Domain\Subject;

class SubjectController{
    public function insert($params){
        require_once("../src/views/subject/insert_subject.php");
    }

    public function new($params){
        $subject = new Subject(0, $_POST['name'], $_POST['datep1'], $_POST['datep2']);
        $subjectDAO = new SubjectDAO();
        if($subjectDAO->insert($subject)){
            return "Inserido com sucesso!";
        } else{
            return "Erro ao inserir!";
        }
    }
}