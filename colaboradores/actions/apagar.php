<?php
require_once __DIR__ . "/../app/autoloader.php";
UserService::proibirNaoLogado();

$contatoDao = new ContatosDAO;

try {
    if (isset($_GET['id'])) {
        $contatoDao->apagarPorId($_GET['id']);
        echo '
        <script>
            alert("Objeto apagado com sucesso!");
            window.history.back();
        </script>';
    } else {
        die("ID desconhecido ou não enviado.");
    }
} catch(PDOException $e) {
    die("Falha ao deletar registro: " . $e->getMessage());
    exit;
}