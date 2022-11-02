<?php
class AreaDeAtuacaoDAO extends DAO 
{
    public function buscarTodos() 
    {
        $query = $this->Conexao->prepare("SELECT id, descricao FROM area_atuacao ORDER BY descricao");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) 
    {
        $query = $this->Conexao->prepare("SELECT id, descricao FROM area_atuacao WHERE id = ? ORDER BY descricao");
        $query->bindParam(1, $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}