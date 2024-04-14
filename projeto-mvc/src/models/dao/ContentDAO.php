<?php

namespace Php\Projetomvc\Models\DAO;

use Php\Projetomvc\Models\Domain\Content;

class ContentDAO{
    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao;
    }

    public function getAll(){
        $sql = "SELECT * from content";
        $p = $this->conexao->getConexao()->prepare($sql);
        $p->execute();
        return $p->fetchAll();
    }

    public function getById($id){
        try{
            $sql = "SELECT * from content WHERE idcontent = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function insert(Content $content){
        try{
            $sql = "INSERT INTO content (subject_idsubject, name, weight) VALUES (:subject_idsubject, :name, :weight)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":subject_idsubject", $content->getSubject()->getId());
            $p->bindValue(":name", $content->getName());
            $p->bindValue(":weight", $content->getWeight());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }
}