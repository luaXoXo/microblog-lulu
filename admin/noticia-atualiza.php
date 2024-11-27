<?php
require "../includes/cabecalho-admin.php";
require "../includes/funcoes-noticias.php";


$idNoticia = $_GET['id'];

$idUsuario = $_SESSION['id'];

$tipoUsuario = $_SESSION['tipo'];

$dadosDaNoticia = lerUmaNoticia(
    $conexao, $idNoticia, $idUsuario, $tipoUsuario
);

if (isset($_POST['atualizar'])){
    $titulo = $_POST['titulo'];
    $texto = $_POST['texto'];
    $resuno = $_POST['resumo'];

    

    if(empty($_FILES['imagem']['name'])){

        $imagem = $_POST['imagem-existente'];

    } else {
        $imagem = $_FILES['imagem']['name'];

        upload($_FILES['imagem']);
    }

    atualizarNoticia(
        $conexao, $titulo, $texto, $resuno, $imagem, $idNoticia, $idUsuario, $tipoUsuario
    );

    header("location:noticias.php");
}
?>



<div class="row">
    <article class="col-12 bg-white rounded shadow my-1 py-4">

        <h2 class="text-center">
            Atualizar dados da notícia
        </h2>

        <form enctype="multipart/form-data" autocomplete="off" class="mx-auto w-75" action="" method="post" id="form-atualizar" name="form-atualizar">

            <div class="mb-3">
                <label class="form-label" for="titulo">Título:</label>
                <input class="form-control" value="<?=$dadosDaNoticia['titulo']?>" required type="text" id="titulo" name="titulo">
            </div>

            <div class="mb-3">
                <label class="form-label" for="texto">Texto:</label>
                <textarea class="form-control" required name="texto" id="texto" cols="50" rows="6"><?=$dadosDaNoticia['texto']?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label" for="resumo">Resumo (máximo de 300 caracteres):</label>
                <span id="maximo" class="badge bg-danger">0</span>
                <textarea class="form-control" required name="resumo" id="resumo" cols="50" rows="2" maxlength="300"><?=$dadosDaNoticia['resumo']?></textarea>
            </div>

            <div class="mb-3">
                <label for="imagem-existente" class="form-label">Imagem da notícia:</label>
                <!-- campo somente leitura, meramente informativo -->
                <input value="<?=$dadosDaNoticia['imagem']?>" class="form-control" type="text" id="imagem-existente" name="imagem-existente" readonly>
            </div>

            <div class="mb-3">
                <label for="imagem" class="form-label">Caso queira mudar, selecione outra imagem:</label>
                <input class="form-control" type="file" id="imagem" name="imagem" accept="image/png, image/jpeg, image/gif, image/svg+xml">
            </div>

            <button class="btn btn-primary" name="atualizar"><i class="bi bi-arrow-clockwise"></i> Atualizar</button>
        </form>

    </article>
</div>


<?php
require "../includes/rodape-admin.php";
?>