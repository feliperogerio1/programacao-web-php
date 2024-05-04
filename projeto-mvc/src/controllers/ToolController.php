<?php

namespace Php\Projetomvc\Controllers;

use Php\Projetomvc\Models\DAO\ToolDAO;
use Php\Projetomvc\Models\DAO\SubjectDAO;
use Php\Projetomvc\Models\Domain\Tool;
use Php\Projetomvc\Models\Domain\Subject;

class ToolController{
    public function index($params){
        $toolDAO = new ToolDAO();
        $result = $toolDAO->getAllWithSubjectName();
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
        require_once("../src/views/tool/tool.php");
    }

    public function insert($params){
        $subjectDAO = new SubjectDAO();
        $subjects = $subjectDAO->getAll();
        require_once("../src/views/tool/insert_tool.php");
    }

    public function new($params){
        $subjectDAO = new SubjectDAO();
        $subject = $subjectDAO->getById($_POST['id_subject']);
        $tool = new Tool(
                    0, 
                    new subject(
                        $subject['idsubject'], 
                        $subject['name'], 
                        $subject['datep1'], 
                        $subject['datep2']
                    ),
                    $_POST['name'],
                    $_POST['description']
                    );
        $toolDAO = new ToolDAO();
        if($toolDAO->insert($tool)){
            header("location: /tool/inserir/true");
        } else{
            header("location: /tool/inserir/false");
        }
    }

    public function update($params){
        $subjectDAO = new SubjectDAO();
        $subjects = $subjectDAO->getAll();
        $toolDAO = new ToolDAO();
        $result = $toolDAO->getById($params[1]);
        require_once("../src/views/tool/update_tool.php");
    }

    public function delete($params){
        $toolDAO = new ToolDAO();
        $result = $toolDAO->getById($params[1]);
        $subjectDAO = new SubjectDAO();
        $current_subject = $subjectDAO->getById($result['subject_idsubject']);
        require_once("../src/views/tool/delete_tool.php");
    }

    public function edit($params){
        $subjectDAO = new SubjectDAO();
        $subject = $subjectDAO->getById($_POST['id_subject']);
        $tool = new Tool(
                        $_POST['id'], 
                        new subject(
                            $subject['idsubject'], 
                            $subject['name'], 
                            $subject['datep1'], 
                            $subject['datep2']
                        ), 
                        $_POST['name'], 
                        $_POST['description']
                    );
        $toolDAO = new ToolDAO;
        if($toolDAO->update($tool)){
            header("location: /tool/alterar/true");
        } else{
            header("location: /tool/alterar/false");
        }
    }

    public function erase($params){
        $toolDAO = new toolDAO;
        if($toolDAO->delete($_POST['id'])){
            header("location: /tool/excluir/true");
        } else{
            header("location: /tool/excluir/false");
        }
    }
}