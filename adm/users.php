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
    <link rel="stylesheet" type="text/css" href="./styles/estiloPadrão.css">
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
                <ul id="users">
                    <?php
                    include_once("../conexao.php");
                    $result_usuario = "SELECT * FROM aluno";
                    $resultado_usuario = mysqli_query($sql, $result_usuario);
                    while ($row_usuario = mysqli_fetch_assoc($resultado_usuario)) {
                        echo '<li class="user">';
                        echo '<img src="../fotosPerfil/' . $row_usuario['foto_aluno'] . '" alt="Foto do aluno" class="imgUser">';
                        echo '<h1 id="nomeUser">' . $row_usuario['nome_aluno'] . '</h1>';
                        echo '<a id="saibaMais" href="alunos_saibamais.php?id=' . $row_usuario['id_aluno'] . '">Saiba Mais</a>';
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
                <ul id="users">
                    <?php
                    include_once("../conexao.php");
                    $result_usuario = "SELECT * FROM professor";
                    $resultado_usuario = mysqli_query($sql, $result_usuario);
                    while ($row_usuario = mysqli_fetch_assoc($resultado_usuario)) {
                        echo '<li class="user">';
                        echo '<img src="../fotosPerfil/' . $row_usuario['foto_professor'] . '" alt="Foto do Professor" class="imgUser">';
                        echo '<h1 id="nomeUser">' . $row_usuario['nome_professor'] . '</h1>';
                        echo '<a id="saibaMais" href="alunos_saibamais.php?id=' . $row_usuario['id_professor'] . '">Saiba Mais</a>';
                        echo '</li>';
                    }
                    ?>
                </ul>
                <button id="abrirAdicionarProfessor">Adicionar Professor</button>
            </div>
        </section>
    </main>
</body>
</html>