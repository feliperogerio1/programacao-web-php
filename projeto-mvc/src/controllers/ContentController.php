<?php

namespace Php\Projetomvc\Controllers;

use Php\Projetomvc\Models\DAO\ContentDAO;
use Php\Projetomvc\Models\DAO\SubjectDAO;
use Php\Projetomvc\Models\Domain\Content;
use Php\Projetomvc\Models\Domain\Subject;

class ContentController{
    public function insert($params){
        $subjectDAO = new SubjectDAO();
        $subjects = $subjectDAO->getAll();
        require_once("../src/views/content/insert_content.php");
    }

    public function new($params){
        $subjectDAO = new SubjectDAO();
        $subject = $subjectDAO->getById($_POST['id_subject']);
        $content = new Content(0, new subject($subject['idsubject'], $subject['name'], 
                    $subject['datep1'], 
                    $subject['datep2']), 
                    $_POST['name'], $_POST['weight']);
        $contentDAO = new ContentDAO();
        if($contentDAO->insert($content)){
            return "Inserido com sucesso!";
        } else{
            return "Erro ao inserir!";
        }
    }
}