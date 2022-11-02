<?php
/**
 * Para que possamos guardar todos os dados do usuário
 * vamos utilizar da superglobal $_SESSION, pois, com ela
 * podemos separar todos os dados do cliente de forma segura
 * e não compartilhada com outras sessões (outros usuários acessando a página)
 * 
 * De forma geral, os dados salvos em uma sessão só podem ser acessados por ela mesma.
 * 
 * TODOS OS DADOS DE SESSÃO SÃO ARMAZENADOS PELO BACK-END, ONDE O CLIENTE CONHECE APENAS
 * O SEU ID, QUE É ARMAZENADO EM FORMA DE COOKIE PELO NAVEGADOR.
 */
class UserService 
{
    private $Conexao;

    public function __construct()
    {
        # conectando ao banco de dados
        $this->Conexao = MySQLDatabase::getInstance();
    }

    /**
     * vamos utilizar este método para recuperar os dados do usuário
     * e vamos armazena-lo sobre o índice $_SESSION['user_data']
     */
    public function getUsuario()
    {
        if (isset($_SESSION['user_data'])) {
            return $_SESSION['user_data'];

        } else {
            return null;
        }
        
    }

    /**
     * Vamos utilizar este método para descobrir se o usuário está logado
     * verificando se existem dados no $_SESSION['user_data']
     */
    public function estaLogado()
    {
        if ($this->getUsuario() != null) {
            return true;
        }
        return false;
    }

    public static function proibirNaoLogado()
    {
        if (!isset($_SESSION['user_data'])) {
            echo '<script>window.location.href = "denied.html"</script>';
            exit;
        }
    }

    /**
     * utilizando de uma busca no banco de dados
     * é verificado se o usuario existe, e claro se ele existir, seus
     * nome de usuário é guardado sobre o $_SESSION['user_data']
     * 
     * Caso contrário apenas um retorno FALSE para avisar erro de login.
     */
    public function login($username, $password)
    {
        $sql = "SELECT * FROM usuarios WHERE usuario = ? AND senha = ?";
    
        $query = $this->Conexao->prepare($sql);

        $query->bindParam(1, $username, PDO::PARAM_STR);
        $query->bindParam(2, $password, PDO::PARAM_STR);
        $query->execute();

        $resultado = $query->fetch(PDO::FETCH_ASSOC);
        if ($resultado !== false) {
            $_SESSION['user_data'] = $resultado['usuario'];
            return true;
        }
        return false;
    }

    public function logout()
    {
        # com a chamada do método 'session_destroy' todos os dados
        # da $_SESSION serão apagados, invalidando nosso $_SESSION['user_data']
        session_destroy();
    }
}