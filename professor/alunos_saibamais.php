<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do Administrador</title>
    <link rel="stylesheet" type="text/css" href="./styles/estiloPadrão.css">
    <link rel="stylesheet" type="text/css" href="./styles/estiloSaibaMais.css">
</head>

<body>
    <?php include_once "./includes/menuProfessor.php"; ?>
    <main>
        <div class="container">
        <span width="90px"></span>
        <h1 id="title">Alunos</h1>
        <span width="90px"></span>
</div>
        <div class="container">

        <a href="alunos.php">
        <img id="voltar" src="./images/voltarseta.png" alt="Seta para voltar" />
        </a>

        <section id="tela">
                <section id="editFoto">
                    <img src="./images/usuario.png" id="fotoPerfil" accept="./images/*">
                </section>
                <span></span>
        </section>
</div id="container">
    </main>
</body>
<script src="./js/addAlunoOpenClose.js"></script>
<script src="./js/menuOpenClose.js"></script>
<?php include_once "includes/modalNotificar.php"; ?>

</html>