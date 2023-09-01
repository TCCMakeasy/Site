<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 2) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../professor/login.php");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suas Informações</title>
    <link rel="stylesheet" type="text/css" href="./styles/estiloPadrão.css">
    <link rel="stylesheet" type="text/css" href="./styles/estiloAlunos.css">
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />
</head>

<body id="bodyAlunos">
    <?php include_once "./includes/menuProfessor.php"; ?>
    <main>
        <section>
            <h1 id="title">Alunos</h1>
            <div id="container">
                <div id="alert" class="avisos"><?php if (isset($_SESSION['msg'])) {echo $_SESSION['msg'];} ?></div>
                <ul id="alunos">
                <?php
                    include_once("../conexao.php");
                    $result_usuario = "SELECT * FROM aluno where id_professor = '".$_SESSION['id']."'";
                    $resultado_usuario = mysqli_query($sql, $result_usuario);
                    while ($row_usuario = mysqli_fetch_assoc($resultado_usuario)) {
                        echo '<li class="aluno">';
                        echo '<img src="./fotosPerfil/' . $row_usuario['foto_aluno'] . '" alt="Foto do aluno" class="imgAluno">';
                        echo '<h1 id="nomeProfessor">' . $row_usuario['nome_aluno'] . '</h1>';
                        echo '<a id="saibaMais" href="google.com">Saiba Mais</a>';
                        echo '</li>';
                    }
                    ?>
                </ul>
                <button id="abrirAdicionarAluno">Adicionar Aluno</button>
            </div>
        </section>
    </main>
</body>
<dialog id="addAluno">
    <div id="addAluno-content">
        <form action="" method="post" id="formAddAluno">
            <h1>Adicionar Aluno</h1>
            <div id="idAluno">
                <label for="inputIdAluno"><b>ID do aluno:</b></label>
                <input type="text" name="idAluno" id="inputIdAluno" placeholder="ID do Aluno">
            </div>
            <div id="submitAddAluno">
                <input type="submit" id="adicionarAluno" name="btnAddAluno" value="Adicionar Aluno">
                <button id="closeAddAluno">Cancelar</button>
            </div>
        </form>
    </div>
</dialog>
<script src="./js/addAlunoOpenClose.js"></script>
<script src="./js/menuOpenClose.js"></script>
<?php include_once "includes/modalNotificar.php"; ?>

</html>