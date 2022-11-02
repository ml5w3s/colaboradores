<?php
# habilita uma nova sessão
session_start();
# configura um auto REQUIRE de qualquer classe utilizada em nosso projeto
spl_autoload_register( function($className) 
{
    $diretorios = ["db", "services"];

    foreach($diretorios as $pasta) {
        $classProcurada = __DIR__ . "/" . $pasta . "/" . $className . ".php";

        if (file_exists($classProcurada)) {
            // faz o require do arquivo se ele existir sobre o diretorio varrido
            require_once $classProcurada;
            return;
        }

    }
});