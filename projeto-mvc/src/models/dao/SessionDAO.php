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
        return $this->conexao->getConexao()->query($sql);
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

    public function getAllWithSubjectContentName(){
        try{
            $sql = "SELECT se.idsession, c.name as contentname, su.name as subjectname, se.date 
                    from session se
                    INNER JOIN content c
                    on se.content_idcontent = c.idcontent
                    INNER JOIN subject su
                    on se.subject_idsubject = su.idsubject";
            return $this->conexao->getConexao()->query($sql);
        } catch(\Exception $e){
            return 0;
        }
    }

    public function insert(Session $session){
        try{
            $sql = "INSERT INTO session (content_idcontent, subject_idsubject, date) 
                VALUES (:content_idcontent, :subject_idsubject, :date)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":content_idcontent", $session->getContent()->getId());
            $p->bindValue(":subject_idsubject", $session->getSubject()->getId());
            $p->bindValue(":date", $session->getDate());
            return $p->execute();
        } catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function update(Session $session){
        try{
            $sql = "UPDATE session
                    set content_idcontent = :content_idcontent,
                    subject_idsubject = :subject_idsubject,
                    date = :date
                    where idsession = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":content_idcontent", $session->getContent()->getId());
            $p->bindValue(":subject_idsubject", $session->getSubject()->getId());
            $p->bindValue(":date", $session->getDate());
            $p->bindValue(":id", $session->getId());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function delete($id){
        try{
            $sql = "DELETE from session
                    where idsession = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }
}