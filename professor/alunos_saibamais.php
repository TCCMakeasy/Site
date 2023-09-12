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
        <h1 id="title">Alunos</h1>
            <div id="container">
                <div class="mobileSeta">
                    <a href="alunos.php">
                        <img id="voltar" src="./images/voltarseta.png" alt="Seta para voltar" />
                    </a>
                    <div id="foto">
                        <img src="../fotosPerfil/usuario.png" id="fotoPerfil" accept="./images/*">
                        <h1 id="nome_aluno"><b>Aluno<b></h1>
                    </div>
                </div>
                <div id="conteúdo">

                    <div class="dado">
                        <h2 class="cont">Nome Completo:</h2>
                        <label id="valorInput" class="inputText" type="number">Davi Sousa Pedrosa</label>
                    </div>

                    <div class="dado">
                        <h2 class="cont">ID do Aluno:</h2>
                        <label id="valorInput" class="inputText" type="number">@1234567</label>
                    </div>


                    <div class="dado">
                        <h2 class="cont">Email:</h2>
                        <label id="valorInput" class="inputText" type="number">davisousap1223@gmail.com</label>
                    </div>


                    <div class="dado">
                        <h2 class="cont">Telefone:</h2>
                        <label id="valorInput" class="inputText" type="number">(11) 98634-5554</label>
                    </div>

                </div>

                <div id="divDesc">
                    <p id="descTitulo" class="tituloForm">Descrição:</p>
                    <textarea id="descInput" class="inputText" rows="5" name="bio" disabled></textarea>
                </div>
            </div>

    </main>
</body>
<script src="./js/addAlunoOpenClose.js"></script>
<script src="./js/menuOpenClose.js"></script>
<?php include_once "includes/modalNotificar.php"; ?>

</html>