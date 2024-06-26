<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 1) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../aluno/login.php");
}else if(isset($_SESSION['id_professor'])){
    header("Location: ./professor.php?id=".$_SESSION['id_professor']);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suas Informações</title>
    <link rel="stylesheet" type="text/css" href="./styles/estiloProfessores.css">
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />
</head>

<body id="bodyProfessores">
    <?php include_once "./includes/menuAluno.php"; ?>
    <main>
        <section>
            <h1 id="title">Professores</h1>
            <div id="container">
                <div id="pesquisar">
                    <h1 id="pesquisarTitulo">Pesquisar:</h1>
                    <input type="text" id="inputPesquisa" name="pesquisa">
                    <a id="openFiltro"><img src="./images/filtroIco.png" alt="Filtro de pesquisa" id="filtroPesquisa"></a>
                </div>
                <ul id="professores">
                </ul>
            </div>
        </section>
    </main>
</body>
<script src="./js/menuOpenClose.js"></script>
<script src="./js/professoresSearch.js"></script>
<?php include_once "./includes/modalNotificar.php";
include_once "./includes/modalFiltro.php";
unset($_SESSION['msg']); ?>

</html>