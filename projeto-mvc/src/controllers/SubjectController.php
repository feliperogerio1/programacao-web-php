<?php

namespace Php\Projetomvc\Controllers;

use Php\Projetomvc\Models\DAO\SubjectDAO;
use Php\Projetomvc\Models\Domain\Subject;

class SubjectController{
    public function index($params){
        $subjectDAO = new SubjectDAO();
        $result = $subjectDAO->getAll();
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
        require_once("../src/views/subject/subject.php");
    }

    public function insert($params){
        require_once("../src/views/subject/insert_subject.php");
    }

    public function new($params){
        $subject = new Subject(0, $_POST['name'], $_POST['datep1'], $_POST['datep2']);
        $subjectDAO = new SubjectDAO();
        if($subjectDAO->insert($subject)){
            header("location: /subject/inserir/true");
        } else{
            header("location: /subject/inserir/false");
        }
    }

    public function update($params){
        $subjectDAO = new SubjectDAO();
        $result = $subjectDAO->getById($params[1]);
        require_once("../src/views/subject/update_subject.php");
    }

    public function delete($params){
        $subjectDAO = new SubjectDAO();
        $result = $subjectDAO->getById($params[1]);
        require_once("../src/views/subject/delete_subject.php");
    }

    public function edit($params){
        $subject = new Subject($_POST['id'], $_POST['name'], $_POST['datep1'], $_POST['datep2']);
        $subjectDAO = new SubjectDAO;
        if($subjectDAO->update($subject)){
            header("location: /subject/alterar/true");
        } else{
            header("location: /subject/alterar/false");
        }
    }

    public function erase($params){
        $subjectDAO = new SubjectDAO;
        if($subjectDAO->delete($_POST['id'])){
            header("location: /subject/excluir/true");
        } else{
            header("location: /subject/excluir/false");
        }
    }
}