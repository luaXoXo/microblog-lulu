<?php

require "conecta.php";


function executarQuery($conexao, $sql){
    $consulta = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return $consulta;
}

function inserirUsuario($conexao, $nome, $email, $senha, $tipo){
    //montando o comando SQL para fazer INSERT dos dados

    $sql = "INSERT INTO usuarios (nome, email, tipo, senha)
            VALUES('$nome', '$email', '$tipo', '$senha')";

    //executando o comando no banco via php
    executarQuery($conexao, $sql);

}


function listarUsuarios($conexao){
    $sql = "SELECT nome, email, tipo, id FROM usuarios";
    $resultado = executarQuery($conexao, $sql);
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function listarUmUsuario($conexao, $id){
    // Comando SELECT para carregar dados de UMA PESSOA através do ID
    $sql = "SELECT * FROM usuarios WHERE id = $id";

    // Execução e verificação do comando SQL
    $resultado = executarQuery($conexao, $sql);
    // Extração dos dados de UMA PESSOA como Array Associativo
    return mysqli_fetch_assoc($resultado);
}



function atualizarUsuario($conexao, $id, $nome, $email, $senha, $tipo){
    $sql = "UPDATE usuarios SET
                nome = '$nome',
                email = '$email',
                senha = '$senha',
                tipo = '$tipo'
            WHERE id = $id"; // NÃO ESQUEÇA NUNCA ESSA BAGAÇA! 

    // COPIE E COLE AQUI O MYSQLI_QUERY DA FUNÇÃO inserirUsuario
    executarQuery($conexao, $sql);
}

function excluirUsuario($conexao, $id){
    $sql = "DELETE FROM usuarios WHERE id = $id";
    executarQuery($conexao, $sql);
}


function buscarUsuario($conexao, $email){
    $sql = "SELECT * FROM usuarios WHERE email = '$email' ";
    $resultado = executarQuery($conexao, $sql);
    return mysqli_fetch_assoc($resultado);
}