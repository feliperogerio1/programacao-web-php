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
        return $this->conexao->getConexao()->query($sql);
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

    public function getAllWithSubjectName(){
        try{
            $sql = "SELECT c.idcontent, c.name as contentname, c.weight, s.name as subjectname  
                    from content c
                    INNER JOIN subject s
                    on c.subject_idsubject = s.idsubject";
            return $this->conexao->getConexao()->query($sql);
        } catch(\Exception $e){
            return 0;
        }
    }

    public function insert(Content $content){
        try{
            $sql = "INSERT INTO content (subject_idsubject, name, weight) 
                VALUES (:subject_idsubject, :name, :weight)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":subject_idsubject", $content->getSubject()->getId());
            $p->bindValue(":name", $content->getName());
            $p->bindValue(":weight", $content->getWeight());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function update(Content $content){
        try{
            $sql = "UPDATE content
                    set name = :name,
                    weight = :weight,
                    subject_idsubject = :subject_idsubject
                    where idcontent = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":subject_idsubject", $content->getSubject()->getId());
            $p->bindValue(":name", $content->getName());
            $p->bindValue(":weight", $content->getWeight());
            $p->bindValue(":id", $content->getId());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function delete($id){
        try{
            $sql = "DELETE from content
                    where idcontent = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }
}