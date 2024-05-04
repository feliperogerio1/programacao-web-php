<?php

namespace Php\Projetomvc\Models\DAO;

use Php\Projetomvc\Models\Domain\Tool;

class ToolDAO{
    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao;
    }

    public function getAll(){
        $sql = "SELECT * from tool";
        $p = $this->conexao->getConexao()->prepare($sql);
        $p->execute();
        return $p->fetchAll();
    }

    public function getById($id){
        try{
            $sql = "SELECT * from tool WHERE idtool = :id";
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
            $sql = "SELECT t.idtool, t.name as toolname, t.description, s.name as subjectname  
                    from tool t
                    INNER JOIN subject s
                    on t.subject_idsubject = s.idsubject";
            return $this->conexao->getConexao()->query($sql);
        } catch(\Exception $e){
            return 0;
        }
    }

    public function insert(Tool $tool){
        try{
            $sql = "INSERT INTO tool (subject_idsubject, name, description) 
                VALUES (:subject_idsubject, :name, :description)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":subject_idsubject", $tool->getSubject()->getId());
            $p->bindValue(":name", $tool->getName());
            $p->bindValue(":description", $tool->getDescription());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function update(Tool $tool){
        try{
            $sql = "UPDATE tool
                    set name = :name,
                    description = :description,
                    subject_idsubject = :subject_idsubject
                    where idtool = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":subject_idsubject", $tool->getSubject()->getId());
            $p->bindValue(":name", $tool->getName());
            $p->bindValue(":description", $tool->getDescription());
            $p->bindValue(":id", $tool->getId());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function delete($id){
        try{
            $sql = "DELETE from tool
                    where idtool = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }
}