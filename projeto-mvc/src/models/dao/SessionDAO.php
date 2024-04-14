<?php

namespace Php\Projetomvc\Models\DAO;

use Php\Projetomvc\Models\Domain\Session;

class SessionDAO{
    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao;
    }

    public function getAll(){
        $sql = "SELECT * from session";
        $p = $this->conexao->getConexao()->prepare($sql);
        $p->execute();
        return $p->fetchAll();
    }

    public function getById($id){
        try{
            $sql = "SELECT * from session WHERE idsession = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function insert(Session $session){
        try{
            $sql = "INSERT INTO session (idsession, content_idcontent, subject_idsubject, date) 
                VALUES (:idsession, :content_idcontent, :subject_idsubject, :date)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":idsession", $session->getId());
            $p->bindValue(":content_idcontent", $session->getContent()->getId());
            $p->bindValue(":subject_idsubject", $session->getSubject()->getId());
            $p->bindValue(":date", $session->getDate());
            return $p->execute();
        } catch(\Exception $e){
            return $e->getMessage();
        }
    }
}