<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 3) {
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
    <link rel="stylesheet" type="text/css" href="./styles/estiloUsers.css">
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />
    <title>Todos os usuários</title>
</head>

<body>
    <?php include_once "./includes/menuAdm.php"; ?>
    <main>
        <section>
            <h1 id="title">Alunos</h1>
            <div id="container">
                <div id="alert" class="avisos"><?php if (isset($_SESSION['msg'])) {
                                                    echo $_SESSION['msg'];
                                                } ?></div>
                <div id="pesquisar">
                    <h1 id="pesquisarTitulo">Pesquisar:</h1>
                    <input type="text" class="inputPesquisa" id="pesquisaAluno" name="pesquisa">
                </div>
                <ul class="users" id="usersAlunos">
                    <?php
                    include_once("../conexao.php");
                    $result_usuario = "SELECT * FROM aluno";
                    $resultado_usuario = mysqli_query($sql, $result_usuario);
                    while ($row_usuario = mysqli_fetch_assoc($resultado_usuario)) {
                        echo '<li class="user">';
                        echo '<img src="../fotosPerfil/' . $row_usuario['foto_aluno'] . '" alt="Foto do aluno" class="imgUser">';
                        echo '<h1 id="nomeUser">' . $row_usuario['nome_aluno'] . '</h1>';
                        echo '<a id="saibaMais" href="gerenciarAluno.php?id=' . $row_usuario['id_aluno'] . '">Saiba Mais</a>';
                        echo '</li>';
                    }
                    ?>
                </ul>
            </div>
        </section>
        <section>
            <h1 id="title">Professores</h1>
            <div id="container">
                <div id="alert" class="avisos"><?php if (isset($_SESSION['msg'])) {
                                                    echo $_SESSION['msg'];
                                                } ?></div>
                <div id="pesquisar">
                    <h1 id="pesquisarTitulo">Pesquisar:</h1>
                    <input type="text" class="inputPesquisa" id="pesquisaProfessor" name="pesquisa">
                </div>
                <ul class="users" id="usersProfessores">
                    <?php
                    include_once("../conexao.php");
                    $result_usuario = "SELECT * FROM professor";
                    $resultado_usuario = mysqli_query($sql, $result_usuario);
                    while ($row_usuario = mysqli_fetch_assoc($resultado_usuario)) {
                        echo '<li class="user">';
                        echo '<img src="../fotosPerfil/' . $row_usuario['foto_professor'] . '" alt="Foto do Professor" class="imgUser">';
                        echo '<h1 id="nomeUser">' . $row_usuario['nome_professor'] . '</h1>';
                        echo '<a id="saibaMais" href="gerenciarProfessor.php?id=' . $row_usuario['id_professor'] . '">Saiba Mais</a>';
                        echo '</li>';
                    }
                    ?>
                </ul>
                <button id="abrirAdicionarProf">Adicionar Professor</button>
            </div>
        </section>
    </main>
</body>
<dialog id="addProf">
    <div id="addProf-content">
        <form action="./includes/add_Profs.php" method="post" id="formAddProf">
            <h1>Adicionar Professor</h1>
            <div id="nomeProf">
                <label for="inputNomeProf"><b>Nome:</b></label>
                <input type="text" name="nomeProf" id="inputNomeProf" placeholder="Nome do Professor">
            </div>
            <div id="senhaProf">
                <label for="inputsenhaProf"><b>Senha provisória:</b></label>
                <input type="text" name="senhaProf" id="inputSenhaProf">
            </div>
            <div id="emailProf">
                <label for="inputemailProf"><b>Email:</b></label>
                <input type="text" name="emailProf" id="inputEmailProf">
            </div>
            <div id="submitAddProf">
                <input type="submit" id="adicionarProf" name="btnAddProf" value="Adicionar Professor">
                <button id="closeAddProf" type="button">Cancelar</button>
            </div>
        </form>
    </div>
</dialog>
<script src="./js/searchUsers.js"></script>
<script src="./js/addProfOpenClose.js"></script>
</html>