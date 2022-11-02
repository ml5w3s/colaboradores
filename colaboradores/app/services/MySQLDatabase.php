<?php
class MySQLDatabase 
{
    private $conexao;
    private $Username = "root";
    private $Host = "localhost"; # o mesmo que 'localhost'
    private $Password = "root";
    private $BancoDeDados = "versati1_projeto";

    public function __construct() 
    {
        try {
            $this->conexao = new PDO("mysql:host={$this->Host};dbname={$this->BancoDeDados}", $this->Username, $this->Password);
        } catch (PDOException $e) {
            die("ERRO: " . $e->getMessage());
        }
        
    }

    public function getConexao() 
    {
        return $this->conexao;
    }
    
    public static function getInstance()
    {
        $mysqlConnect = new MySQLDatabase;
        return $mysqlConnect->getConexao();
    }

}
