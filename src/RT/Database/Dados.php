<?php

namespace RT\Database;

use RT\ProtudoCategoria;

class Dados
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
        $this->db->beginTransaction();
    }

    public function persist(ProtudoCategoria $protudoCategoria)
    {
        try{
            if($protudoCategoria->getId() === null){

                $SQL = "INSERT INTO produtoCategoria (nome) VALUES (:nome)";
                $stmt = $this->db->prepare($SQL);
                $stmt->execute(array(
                    'nome' => $protudoCategoria->getNome()
                ));
            }else{
                $SQL = "UPDATE produtoCategoria SET nome = :nome WHERE id = :id";
                $stmt = $this->db->prepare($SQL);
                $stmt->execute(array(
                    'id' => $protudoCategoria->getId(),
                    'nome' => $protudoCategoria->getNome()
                ));
            }
        } catch (\PDOException $e) {
            $error = "Erro: " . $e->getMessage();
            $this->pdo->rollBack();
            die($error);
        }
    }

    public function flush()
    {
        $this->db->commit();
    }

    public function read()
    {
        $query = "Select * from produtoCategoria";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


}