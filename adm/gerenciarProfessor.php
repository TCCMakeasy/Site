<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 3) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../../professor/login.php");
} else {
    require_once("../conexao.php");
    $idProfessor = $_GET['id'];
    $infosProfessor = "SELECT nome_professor, email_professor, bio_professor, valor_professor, nota_professor FROM professor WHERE id_professor = '$idProfessor'";
    $resultInfosProfessor = mysqli_query($sql, $infosProfessor);
    $infosProfessor = mysqli_fetch_assoc($resultInfosProfessor);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do Administrador</title>
    <link rel="stylesheet" type="text/css" href="./styles/estiloPadrão.css">
    <link rel="stylesheet" type="text/css" href="./styles/estiloGerenciarProfessor.css">
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />
</head>

<body>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <?php include_once "./includes/menuAdm.php"; ?>
    <main>
        <h1 id="title">Alunos</h1>
        <div id="container">
            <div class="mobileSeta">
                <a onclick="goBack()" style="cursor:pointer;">
                    <img id="voltar" src="./images/voltarseta.png" alt="Seta para voltar" />
                </a>
                <div id="questions">
                    <a><?php echo $infosProfessor['nota_professor']?>/5⭐</a>
                    <a>Preço:R$<?php echo $infosProfessor['valor_professor']?></a>
                    <a href="./denuncias.php" id="report"><img src="./images/denuncia.svg" style="vertical-align: bottom;" alt="denunciar">Denúncias</a>
                </div>
                <div id="foto">
                    <img src="../fotosPerfil/usuario.png" id="fotoPerfil" accept="./images/*">
                    <h1 id="nome_aluno"><b><?php $nome = explode(' ', $infosProfessor['nome_professor']);
                                            if (empty($nome[1])) {
                                                $nome[1] = "";
                                            }
                                            echo $nome[0] . " " . $nome[1]; ?><b></h1>
                </div>

            </div>
            <div id="conteúdo">

                <div class="dado">
                    <h2 class="cont">Nome Completo:</h2>
                    <label id="valorInput" class="inputText" type="number"><?php echo $infosProfessor['nome_professor'] ?></label>
                </div>

                <div class="dado">
                    <h2 class="cont">Email:</h2>
                    <label id="valorInput" class="inputText" type="number"><?php echo $infosProfessor['email_professor'] ?></label>
                </div>

            </div>

            <div id="divDesc">
                <p id="descTitulo" class="tituloForm">Descrição:</p>
                <textarea id="descInput" class="inputText" rows="5" name="bio" disabled><?php if (isset($infosProfessor['bio_professor'])) {
                                                                                            echo $infosProfessor['bio_professor'];
                                                                                        } ?></textarea>
            </div>

            <div id="avaliacoes">
                <span></span>
                <h1 style="font-size: 1.3rem;">Avaliações</h1>
                <p>
                    <span><?php echo $infosProfessor['nota_professor']?>/5⭐</span>
                    <span>2 Avaliações</span>
                </p>
                <div id="avaliacao">
                    <h3>Ana Paula</h3>
                    <p><span>5/5⭐:</span>
                        <span>Gostei bastante da aula, muito boa mesmo</span>
                    </p>
                </div>
            </div>
            <div id="divDesvincular">
                <button id="desvincularProfessor"><a href="./includes/excluirProfessor.php?id=<?php echo $idProfessor?>">Excluir Professor</a></button>
            </div>
        </div>

    </main>
</body>
<script src="./js/menuOpenClose.js"></script>
<?php include_once "includes/modalNotificar.php"; ?>

</html>