 <?php 

 // funcoes-controle-de-acesso.php

/* Sessões (SESSIONS) no PHP
Funcionalidade usada para o controle de acesso à determinadas páginas e/ou recursos do site.

Exemplos: área administrativa, painel de controle, área de cliente/ aluno etc.

Nestas áreas o acesso se dá através de alguma forma de autenticação. Exemplos: login/senha, biometria, facial, 2-fatores etc */

if( !isset($_SESSION)){
    session_start();
}



function verificaAcesso(){
    if( !isset($_SESSION['id'])){
        session_destroy();
        header("location:../login.php?acesso_negado");
        die();
    }
}


function login($id, $nome, $tipo){
    $_SESSION['id'] = $id;
    $_SESSION['nome'] = $nome;
    $_SESSION['tipo'] = $tipo;
}

function logout(){
    session_destroy();
    header("location:../login.php?saiu");
    die();
}

function verificarNivel(){
    if($_SESSION['tipo'] !== 'admin'){
        header("location:nao-autorizado.php");
        die(); 
    }
}