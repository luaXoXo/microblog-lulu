<?php
// parametros de acesso ao servidor
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "microblog_lulu";

// acessar a função de conexão ao servidor de BD
$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

// definindo o charset UTF8 para a conexão
mysqli_set_charset($conexao, "utf8");

if ( $conexao === false ){
    die("Erro: " .mysqli_connect_error());
} else {
    echo "beleza, segue o jogo...";
}
