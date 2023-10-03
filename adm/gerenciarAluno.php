<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 3) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../professor/login.php");
} else {
    require_once("../conexao.php");
    $idAluno = $_GET['id'];
    $sqlSelect = "SELECT * FROM aluno WHERE id_aluno = '$idAluno'";
    $sqlAluno = mysqli_fetch_assoc(mysqli_query($sql, $sqlSelect));
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Aluno (ADM)</title>
    <link rel="stylesheet" type="text/css" href="./styles/estiloPadrão.css">
    <link rel="stylesheet" type="text/css" href="./styles/estiloSaibaMais.css">
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />
</head>

<body>
    <?php include_once "./includes/menuAdm.php"; ?>
    <main>
        <h1 id="title">Alunos</h1>
        <div id="container">
            <div class="mobileSeta">
                <a href="users.php">
                    <img id="voltar" src="./images/voltarseta.png" alt="Seta para voltar" />
                </a>
                <div id="foto">
                    <img src="../fotosPerfil/usuario.png" id="fotoPerfil" accept="./images/*">
                    <h1 id="nome_aluno"><b><?php $nome = explode(' ', $sqlAluno['nome_aluno']);
                                            if (empty($nome[1])) {
                                                $nome[1] = "";
                                            }
                                            echo $nome[0] . " " . $nome[1]; ?><b></h1>
                </div>
            </div>
            <div id="conteúdo">

                <div class="dado">
                    <h2 class="cont">Nome Completo:</h2>
                    <label id="valorInput" class="inputText" type="number"><?php echo $sqlAluno['nome_aluno'] ?></label>
                </div>

                <div class="dado">
                    <h2 class="cont">ID do Aluno:</h2>
                    <label id="valorInput" class="inputText" type="number"><?php echo $idAluno ?></label>
                </div>


                <div class="dado">
                    <h2 class="cont">Email:</h2>
                    <label id="valorInput" class="inputText" type="number"><?php echo $sqlAluno['email_aluno'] ?></label>
                </div>

            </div>

            <div id="divDesc">
                <p id="descTitulo" class="tituloForm">Descrição:</p>
                <textarea id="descInput" class="inputText" rows="5" name="bio" disabled><?php if(isset($sqlAluno['desc_aluno'])){echo $sqlAluno['desc_aluno'];} ?></textarea>
            </div>
            <div id="divDesvincularAluno">
                <button id="desvincularAluno"><a href="./includes/excluirAluno.php?id=<?php echo $idAluno?>">Excluir aluno</a></button>
            </div>
        </div>

    </main>
</body>
<script src="./js/menuOpenClose.js"></script>
<?php include_once "includes/modalNotificar.php"; ?>
</html>