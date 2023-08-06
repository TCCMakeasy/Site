<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suas Informações</title>
    <link rel="stylesheet" type="text/css" href="./styles/estiloPadrão.css">
    <link rel="stylesheet" type="text/css" href="./styles/estiloAlunos.css">
</head>

<body id="bodyAlunos">
    <?php include_once "./includes/menuProfessor.php"; ?>
    <main>
        <section>
            <h1 id="title">Alunos</h1>
            <div id="container">
                    <ul id="alunos">
                        <li class="aluno">
                            <img src="./images/usuario.png" alt="Foto do aluno" class="imgAluno">
                            <h1 id="nomeAluno">Nome do Aluno</h1>
                            <a id="saibaMais" href="google.com">Saiba Mais</a>
                        </li>
                        <li class="aluno">
                            <img src="./images/usuario.png" alt="Foto do aluno" class="imgAluno">
                            <h1 id="nomeAluno">Nome do Aluno</h1>
                            <a id="saibaMais" href="google.com">Saiba Mais</a>
                        </li>
                        <li class="aluno">
                            <img src="./images/usuario.png" alt="Foto do aluno" class="imgAluno">
                            <h1 id="nomeAluno">Nome do Aluno</h1>
                            <a id="saibaMais" href="google.com">Saiba Mais</a>
                        </li>
                        <li class="aluno">
                            <img src="./images/usuario.png" alt="Foto do aluno" class="imgAluno">
                            <h1 id="nomeAluno">Nome do Aluno</h1>
                            <a id="saibaMais" href="google.com">Saiba Mais</a>
                        </li>
                        <li class="aluno">
                            <img src="./images/usuario.png" alt="Foto do aluno" class="imgAluno">
                            <h1 id="nomeAluno">Nome do Aluno</h1>
                            <a id="saibaMais" href="google.com">Saiba Mais</a>
                        </li>
                        <li class="aluno">
                            <img src="./images/usuario.png" alt="Foto do aluno" class="imgAluno">
                            <h1 id="nomeAluno">Nome do Aluno</h1>
                            <a id="saibaMais" href="google.com">Saiba Mais</a>
                        </li>
                        <li class="aluno">
                            <img src="./images/usuario.png" alt="Foto do aluno" class="imgAluno">
                            <h1 id="nomeAluno">Nome do Aluno</h1>
                            <a id="saibaMais" href="google.com">Saiba Mais</a>
                        </li>
                        <li class="aluno">
                            <img src="./images/usuario.png" alt="Foto do aluno" class="imgAluno">
                            <h1 id="nomeAluno">Nome do Aluno</h1>
                            <a id="saibaMais" href="google.com">Saiba Mais</a>
                        </li>
                    </ul>
                    <button id="adicionarAluno">Adicionar Aluno</button>
                </div>
        </section>
    </main>
</body>
<script src="./js/menuOpenClose.js"></script>
<?php include_once "includes/modalNotificar.php"; ?>

</html>