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
    <link rel="stylesheet" type="text/css" href="./styles/estiloDenuncias.css">
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />
    <title>Usuários</title>
</head>

<body>
    <h1 id="title" hidden>Usuários</h1>
    <?php include_once "./includes/menuAdm.php"; ?>
    <main>
        <section>
            <h1 class="title">Denúncias</h1>
            <div id="container">
                <h1 id="pesquisarTitulo">Pesquisar:</h1>
                <input type="text" class="inputPesquisa" id="pesquisaAProfessores" name="pesquisa">
            </div>
            <ul class="users" id="usersProfessores">
            </ul>
            </div>
        </section>
        </main>
</body>
<script src="./js/searchUsers.js"></script>
<script src="./js/menuOpenClose.js"></script>
<?php include_once "includes/modalNotificar.php"; ?>

</html>