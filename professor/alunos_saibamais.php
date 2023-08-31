<?php
session_start();

//if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 2) {
//    $_SESSION['msg'] = "Faça login para acessar o sistema";
//    header("Location: ../professor/login.php");
//}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do Administrador</title>
    <link rel="stylesheet" type="text/css" href="./styles/estiloPadrão.css">
    <link rel="stylesheet" type="text/css" href="./styles/estiloSaibaMais.css">
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />
</head>

<body>
    <?php include_once "./includes/menuProfessor.php"; ?>
    <main>
        <div class="container">
        <h1 id="title">Alunos</h1>
</div>

        <a href="alunos.php">
        <img id="voltar" src="./images/voltarseta.png" alt="Seta para voltar" />
        </a>

        <sec id="tela">
                <section id="editFoto">
                    <img src="./fotosPerfil/usuario.png" id="fotoPerfil" accept="./images/*">
                </section>
                <center id="nome_aluno"><b>Aluno<b></center>

</div id="container">
    <div id="formInfos">

        <div class="conteúdo">
            
                    <div class="legenda" style="float: left; margin-left: 50px;">

                        <div id="valorTitulo" class="tituloForm">Nome Completo:</div>
                        <div id="valorTitulo" class="tituloForm">ID do Aluno:</div>
                        <div id="valorTitulo" class="tituloForm">Email:</div>
                        <div id="valorTitulo" class="tituloForm">Telefone:</div>

                    </div>
                    
                    <div class="cont" style="float: right; margin-right: 600px;">

                        <div id="valorInput" class="inputText" type="number">a</div>
                        <div id="valorInput" class="inputText" type="number">a</div>
                        <div id="valorInput" class="inputText" type="number">a</div>
                        <div id="valorInput" class="inputText" type="number">a</div>

                    </div>
        
        </div>

    </div>

    </main>
</body>
<script src="./js/addAlunoOpenClose.js"></script>
<script src="./js/menuOpenClose.js"></script>
<?php include_once "includes/modalNotificar.php"; ?>

</html>