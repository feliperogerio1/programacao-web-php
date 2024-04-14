<?php

namespace Php\Projetomvc\Controllers;

use Php\Projetomvc\Models\DAO\ToolDAO;
use Php\Projetomvc\Models\DAO\SubjectDAO;
use Php\Projetomvc\Models\Domain\Tool;
use Php\Projetomvc\Models\Domain\Subject;

class ToolController{
    public function insert($params){
        $subjectDAO = new SubjectDAO();
        $subjects = $subjectDAO->getAll();
        require_once("../src/views/tool/insert_tool.php");
    }

    public function new($params){
        $subjectDAO = new SubjectDAO();
        $subject = $subjectDAO->getById($_POST['id_subject']);
        $tool = new Tool(0, 
                    new subject(
                        $subject['idsubject'], 
                        $subject['name'], $subject['datep1'], 
                        $subject['datep2']),
                    $_POST['name'],
                    $_POST['description']
                    );
        $toolDAO = new ToolDAO();
        if($toolDAO->insert($tool)){
            return "Inserido com sucesso!";
        } else{
            return "Erro ao inserir!";
        }
    }
}