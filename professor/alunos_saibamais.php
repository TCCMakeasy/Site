<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do Administrador</title>
    <link rel="stylesheet" type="text/css" href="./styles/estiloPadrão.css">
    <link rel="stylesheet" type="text/css" href="./styles/estiloSaibaMais.css">
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />
</head>

<body>
    <?php include_once "./includes/menuProfessor.php"; ?>
    <main>
        <div class="container">
        <h1 id="title">Alunos</h1>
</div>

        <a href="alunos.php">
        <img id="voltar" src="./images/voltarseta.png" alt="Seta para voltar" />
        </a>

        <sec id="tela">
                <section id="editFoto">
                    <img src="./images/usuario.png" id="fotoPerfil" accept="./images/*">
                </section>
                <label id="nome_aluno"><b>Aluno<b></label>

</div id="container">
    <form id="formInfos">
                <section id="editInfos">

                    <div id="divValor" class="divInputText">
                        <label id="valorTitulo" class="tituloForm">Preço:</label>
                        <label class="inputP"><input id="valorInput" class="inputText" type="number"></label>
                    </div>
                    <div id="divDesc">
                        <label id="descTitulo" class="tituloForm">Descrição:</label>
                        <textarea id="descInput" class="inputText" rows="5"></textarea>
                    </div>
                    <div id="divBtn">
                        <input id="btnSalvar" class="btn" type="submit" value="Salvar">
                    </div>
        </form>
        </sec>
                </section>

    </main>
</body>
<script src="./js/addAlunoOpenClose.js"></script>
<script src="./js/menuOpenClose.js"></script>
<?php include_once "includes/modalNotificar.php"; ?>

</html>