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
    <title>Denúncias</title>
</head>

<body <?php echo 'onload="getDenuncias('.$_SESSION['id'].')"'?>>
    <?php include_once "./includes/menuAdm.php"; ?>
    <section id="tela">
        <main>
            <section id="denuncias">
                <h1 class="title">Denúncias</h1>
                <div id="container">
                    <div id="pesquisar">
                        <h1 id="pesquisarTitulo">ID do professor:</h1>
                        <input type="number" class="inputPesquisa" id="pesquisaProfessores" name="pesquisa">
                    </div>
                    <h1 id="nomeProfessor"></h1>
                    <table id="tabela">
                        <tr id="titleTabela">
                            <th class="denunciaTitle">Denunciador</th>
                            <th class="denunciaTitle">Motivo</th>
                            <th class="denunciaTitle">Descrição</th>
                            <th class="denunciaTitle">Data</th>
                            <th class="denunciaTitle"></th>
                        </tr>
                    </table>
                </div>
            </section>
        </main>
    </section>


</body>
<script src="./js/getDenuncias.js"></script>
<script src="./js/menuOpenClose.js"></script>
<?php include_once "includes/modalNotificar.php"; ?>

</html>