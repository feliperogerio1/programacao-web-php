<?php

namespace Php\Projetomvc\Controllers;

use Php\Projetomvc\Models\DAO\SessionDAO;
use Php\Projetomvc\Models\DAO\ContentDAO;
use Php\Projetomvc\Models\DAO\SubjectDAO;
use Php\Projetomvc\Models\Domain\Session;
use Php\Projetomvc\Models\Domain\Content;
use Php\Projetomvc\Models\Domain\Subject;

class SessionController{
    public function insert($params){
        $contentDAO = new ContentDAO();
        $contents = $contentDAO->getAll();
        $subjectDAO = new SubjectDAO();
        $subjects = $subjectDAO->getAll();
        require_once("../src/views/session/insert_session.php");
    }

    public function new($params){
        $contentDAO = new ContentDAO();
        $content = $contentDAO->getById($_POST['id_content']);
        $subjectDAO = new SubjectDAO();
        $subject = $subjectDAO->getById($_POST['id_subject']);
        $session = new Session(0,
                    new Content(
                        $content['idcontent'], 
                        new Subject(
                            $subject['idsubject'], 
                            $subject['name'], 
                            $subject['datep1'], 
                            $subject['datep2']), 
                        $content['name'], 
                        $content['weight']), 
                    new Subject(
                        $subject['idsubject'], 
                        $subject['name'], 
                        $subject['datep1'], 
                        $subject['datep2']), 
                    $_POST['date']);
        $sessionDAO = new SessionDAO();
        if($sessionDAO->insert($session)){
            return "Inserido com sucesso!";
        } else{
            return "Erro ao inserir!";
        }
    }
}