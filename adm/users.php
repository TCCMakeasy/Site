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
    <title>Usuários</title>
</head>

<body>
    <h1 id="title" hidden>Usuários</h1>
    <?php include_once "./includes/menuAdm.php"; ?>
    <main>
        <section>
            <h1 class="title">Alunos</h1>
            <div id="container">
                <div id="alert" class="avisos"><?php if (isset($_SESSION['msg'])) {
                                                    echo $_SESSION['msg'];
                                                } ?></div>
                <div id="pesquisar">
                    <h1 id="pesquisarTitulo">Pesquisar:</h1>
                    <input type="text" class="inputPesquisa" id="pesquisaAluno" name="pesquisa">
                </div>
                <ul class="users" id="usersAlunos">
                </ul>
            </div>
        </section>
        <section>
            <h1 class="title">Professores</h1>
            <div id="container">
                <div id="alert" class="avisos"><?php if (isset($_SESSION['msg'])) {
                                                    echo $_SESSION['msg'];
                                                } ?></div>
                <div id="pesquisar">
                    <h1 id="pesquisarTitulo">Pesquisar:</h1>
                    <input type="text" class="inputPesquisa" id="pesquisaProfessor" name="pesquisa">
                </div>
                <ul class="users" id="usersProfessores">
                </ul>
                <button id="abrirAdicionarProf">Adicionar Professor</button>
            </div>
        </section>
    </main>
</body>
<dialog id="addProf">
    <div id="addProf-content">
        <form action="./includes/add_prof.php" method="post" id="formAddProf">
            <h1>Adicionar Professor</h1>
            <div id="nomeProf">
                <label for="inputNomeProf"><b>Nome:</b></label>
                <input type="text" name="nomeProf" id="inputNomeProf" placeholder="Nome do Professor">
            </div>
            <div id="senhaProf">
                <label for="inputsenhaProf"><b>Senha:</b></label>
                <input type="password" name="senhaProf" id="inputSenhaProf" placeholder="•••••••••••••">
            </div>
            <div id="emailProf">
                <label for="inputemailProf"><b>Email:</b></label>
                <input type="email" name="emailProf" id="inputEmailProf" placeholder="Professor@gmail.com">
            </div>
            <div id="emailProf">
                <label for="inputemailProf"><b>Data de nasc.:</b></label>
                <input type="date" name="dataProf" id="inputDateProf" placeholder="9/99/9999">
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
<script src="./js/menuOpenClose.js"></script>
<?php include_once "includes/modalNotificar.php"; ?>

</html>