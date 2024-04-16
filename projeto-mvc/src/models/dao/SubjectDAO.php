<?php

namespace Php\Projetomvc\Models\DAO;

use Php\Projetomvc\Models\Domain\Subject;

class SubjectDAO{
    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao;
    }

    public function getAll(){
        $sql = "SELECT * from subject";
        $p = $this->conexao->getConexao()->prepare($sql);
        $p->execute();
        return $p->fetchAll();
    }

    public function getById($id){
        try{
            $sql = "SELECT * from subject WHERE idsubject = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function insert(Subject $subject){
        try{
            $sql = "INSERT INTO subject (name, datep1, datep2) VALUES (:name, :datep1, :datep2)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":name", $subject->getName());
            $p->bindValue(":datep1", $subject->getDatep1());
            $p->bindValue(":datep2", $subject->getDatep2());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }
}