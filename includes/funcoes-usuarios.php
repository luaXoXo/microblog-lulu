<?php

require "conecta.php";

function inserirUsuario($conexao, $nome, $email, $senha, $tipo){
    //montando o comando SQL para fazer INSERT dos dados

    $sql = "INSERT INTO usuarios (nome, email, tipo, senha)
            VALUES('$nome', '$email', '$tipo', '$senha')";

    //executando o comando no banco via php
    mysqli_query($conexao, $sql)  or die(mysqli_error($conexao));

}


function listarUsuarios($conexao){
    $sql = "SELECT nome, email, tipo, id FROM usuarios";
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}