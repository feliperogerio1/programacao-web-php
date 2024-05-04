<?php

namespace Php\Projetomvc\Controllers;

use Php\Projetomvc\Models\DAO\SessionDAO;
use Php\Projetomvc\Models\DAO\ContentDAO;
use Php\Projetomvc\Models\DAO\SubjectDAO;
use Php\Projetomvc\Models\Domain\Session;
use Php\Projetomvc\Models\Domain\Content;
use Php\Projetomvc\Models\Domain\Subject;

class SessionController{
    public function index($params){
        $sessionDAO = new SessionDAO();
        $result = $sessionDAO->getAllWithSubjectContentName();
        $acao = $params[1] ?? "";
        $status = $params[2] ?? "";
        if($acao == "inserir" && $status == "true"){
            $color = "success";
            $mensagem = "Registro inserido com sucesso";
        } else if($acao == "inserir" && $status == "false"){
            $color = "danger";
            $mensagem = "Erro ao inserir";
        } else if($acao == "alterar" && $status == "true"){
            $color = "success";
            $mensagem = "Registro alterado com sucesso";
        } else if($acao == "alterar" && $status == "false"){
            $color = "danger";
            $mensagem = "Erro ao alterar";
        } else if($acao == "excluir" && $status == "true"){
            $color = "success";
            $mensagem = "Registro excluído com sucesso";
        } else if($acao == "excluir" && $status == "false"){
            $color = "danger";
            $mensagem = "Erro ao excluir";
        } else{
            $mensagem = "";
        }
        require_once("../src/views/session/session.php");
    }

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
        $session = new Session(
                        0,
                        new Content(
                            $content['idcontent'], 
                            new Subject(
                                $subject['idsubject'], 
                                $subject['name'], 
                                $subject['datep1'], 
                                $subject['datep2']
                            ), 
                            $content['name'], 
                            $content['weight']
                        ), 
                        new Subject(
                            $subject['idsubject'], 
                            $subject['name'], 
                            $subject['datep1'], 
                            $subject['datep2']
                        ), 
                        $_POST['date']);
        $sessionDAO = new SessionDAO();
        if($sessionDAO->insert($session)){
            header("location: /session/inserir/true");
        } else{
            header("location: /session/inserir/false");
        }
    }

    public function update($params){
        $subjectDAO = new SubjectDAO();
        $subjects = $subjectDAO->getAll();
        $contentDAO = new ContentDAO();
        $contents = $contentDAO->getAll();
        $sessionDAO = new SessionDAO;
        $result = $sessionDAO->getById($params[1]);
        require_once("../src/views/session/update_session.php");
    }

    public function delete($params){
        $sessionDAO = new SessionDAO();
        $result = $sessionDAO->getById($params[1]);
        $contentDAO = new ContentDAO;
        $current_content = $contentDAO->getById($result['content_idcontent']);
        $subjectDAO = new SubjectDAO();
        $current_subject = $subjectDAO->getById($result['subject_idsubject']);
        require_once("../src/views/session/delete_session.php");
    }

    public function edit($params){
        $contentDAO = new ContentDAO();
        $content = $contentDAO->getById($_POST['id_content']);
        $subjectDAO = new SubjectDAO();
        $subject = $subjectDAO->getById($_POST['id_subject']);
        $session = new Session(
                        $_POST['id'],
                        new Content(
                            $content['idcontent'], 
                            new Subject(
                                $subject['idsubject'], 
                                $subject['name'], 
                                $subject['datep1'], 
                                $subject['datep2']
                            ), 
                            $content['name'], 
                            $content['weight']
                        ), 
                        new Subject(
                            $subject['idsubject'], 
                            $subject['name'], 
                            $subject['datep1'], 
                            $subject['datep2']
                        ), 
                        $_POST['date']
                    );
        $sessionDAO = new SessionDAO();
        if($sessionDAO->update($session)){
            header("location: /session/alterar/true");
        } else{
            header("location: /session/alterar/false");
        }
    }

    public function erase($params){
        $sessionDAO = new SessionDAO;
        if($sessionDAO->delete($_POST['id'])){
            header("location: /session/excluir/true");
        } else{
            header("location: /session/excluir/false");
        }
    }
}