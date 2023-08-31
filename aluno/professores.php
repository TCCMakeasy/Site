<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 1) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../aluno/login.php");
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
                    <input type="text" id="inputPesquisa">
                    <a href=""><img src="./images/filtroIco.png" alt="Filtro de pesquisa" id="filtroPesquisa"></a>
                </div>
                <ul id="professores">
                    <?php
                    include_once("../conexao.php");
                    $result_usuario = "SELECT * FROM professor";
                    $resultado_usuario = mysqli_query($sql, $result_usuario);
                    while ($row_usuario = mysqli_fetch_assoc($resultado_usuario)) {
                        echo '<li class="professor">';
                        echo '<img src="./fotosPerfil/' . $row_usuario['foto_professor'] . '" alt="Foto do professor" class="imgProfessor">';
                        echo '<h1 id="nomeProfessor">' . $row_usuario['nome_professor'] . '</h1>';
                        echo '<a id="saibaMais" href="google.com">Saiba Mais</a>';
                        echo '</li>';
                    }
                    ?>
                </ul>
            </div>
        </section>
    </main>
</body>
<script src="./js/menuOpenClose.js"></script>
<?php include_once "includes/modalNotificar.php"; ?>

</html>