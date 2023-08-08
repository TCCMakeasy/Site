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
                    <button id="abrirAdicionarAluno">Adicionar Aluno</button>
                </div>
        </section>
    </main>
</body>
<dialog id="addAluno">
    <div id="addAluno-content">
        <form action="" method="post" id="formAddAluno">
            <h1>Adicionar Aluno</h1>
            <div id="idAluno">
            <label for="inputIdAluno"><b>ID do aluno:</b></label>
            <input type="text" name="idAluno" id="inputIdAluno" placeholder="ID do Aluno">
            </div>
            <div id="submitAddAluno">
                <input type="submit" id="adicionarAluno" value="Adicionar Aluno">
                <button id="closeAddAluno">Cancelar</button>
            </div>
        </form>
    </div>
</dialog>
<script src="./js/addAlunoOpenClose.js"></script>
<script src="./js/menuOpenClose.js"></script>
<?php include_once "includes/modalNotificar.php"; ?>

</html>