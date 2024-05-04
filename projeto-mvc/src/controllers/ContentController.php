<?php

namespace Php\Projetomvc\Controllers;

use Php\Projetomvc\Models\DAO\ContentDAO;
use Php\Projetomvc\Models\DAO\SubjectDAO;
use Php\Projetomvc\Models\Domain\Content;
use Php\Projetomvc\Models\Domain\Subject;

class ContentController{
    public function index($params){
        $contentDAO = new ContentDAO();
        $result = $contentDAO->getAllWithSubjectName();
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
        require_once("../src/views/content/content.php");
    }

    public function insert($params){
        $subjectDAO = new SubjectDAO();
        $subjects = $subjectDAO->getAll();
        require_once("../src/views/content/insert_content.php");
    }

    public function new($params){
        $subjectDAO = new SubjectDAO();
        $subject = $subjectDAO->getById($_POST['id_subject']);
        $content = new Content(
                        0, 
                        new subject($subject['idsubject'], 
                                    $subject['name'], 
                                    $subject['datep1'], 
                                    $subject['datep2']), 
                        $_POST['name'], 
                        $_POST['weight']
                    );
        $contentDAO = new ContentDAO();
        if($contentDAO->insert($content)){
            header("location: /content/inserir/true");
        } else{
            header("location: /content/inserir/false");
        }
    }

    public function update($params){
        $subjectDAO = new SubjectDAO();
        $subjects = $subjectDAO->getAll();
        $contentDAO = new ContentDAO();
        $result = $contentDAO->getById($params[1]);
        require_once("../src/views/content/update_content.php");
    }

    public function delete($params){
        $contentDAO = new ContentDAO();
        $result = $contentDAO->getById($params[1]);
        $subjectDAO = new SubjectDAO();
        $current_subject = $subjectDAO->getById($result['subject_idsubject']);
        require_once("../src/views/content/delete_content.php");
    }

    public function edit($params){
        $subjectDAO = new SubjectDAO();
        $subject = $subjectDAO->getById($_POST['id_subject']);
        $content = new Content(
                        $_POST['id'], 
                        new subject($subject['idsubject'], 
                                    $subject['name'], 
                                    $subject['datep1'], 
                                    $subject['datep2']), 
                        $_POST['name'], 
                        $_POST['weight']
                    );
        $contentDAO = new ContentDAO;
        if($contentDAO->update($content)){
            header("location: /content/alterar/true");
        } else{
            header("location: /content/alterar/false");
        }
    }

    public function erase($params){
        $contentDAO = new ContentDAO;
        if($contentDAO->delete($_POST['id'])){
            header("location: /content/excluir/true");
        } else{
            header("location: /content/excluir/false");
        }
    }
}