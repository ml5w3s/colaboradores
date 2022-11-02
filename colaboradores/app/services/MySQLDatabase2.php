<?php
class MySQLDatabase 
{
/* preencha os dados necessáiros para fazer a conexão com o banco de dados
    private $conexao;
    private $Username = "";
    private $Host = "";
    private $Password = "";
    private $BancoDeDados = "";
*/
    public function __construct() 
    {
        try {
            $this->conexao = new PDO("mysql:host={$this->Host};dbname={$this->BancoDeDados}", $this->Username, $this->Password);
        } catch () {//Preencha o parametro da instrução catch
            die());//prepare a mensagem para tratamento de erro e excessão
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
