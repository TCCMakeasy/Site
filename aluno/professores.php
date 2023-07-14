<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suas Informações</title>
    <link rel="stylesheet" type="text/css" href="styles/estiloPadrão.css">
    <link rel="stylesheet" type="text/css" href="styles/estiloProfessores.css">
</head>

<body id="bodyProfessores">
    <?php include_once "includes/menuAluno.php"; ?>
    <main>
        <section>
            <h1 id="title">Professores</h1>
            <div id="container">
                    <div id="pesquisar">
                        <h1 id="pesquisarTitulo">Pesquisar:</h1>
                        <input type="text" id="inputPesquisa">
                        <a href=""><img src="images/filtroIco.png" alt="Filtro de pesquisa" id="filtroPesquisa"></a>
                    </div>
                    <ul id="professores">
                        <li class="professor">
                            <img src="images/usuario.png" alt="Foto do professor" class="imgProfessor">
                            <h1 id="nomeProfessor">Nome do Professor</h1>
                            <a id="saibaMais" href="google.com">Saiba Mais</a>
                        </li>
                        <li class="professor">
                            <img src="images/usuario.png" alt="Foto do professor" class="imgProfessor">
                            <h1 id="nomeProfessor">Nome do Professor</h1>
                            <a id="saibaMais" href="google.com">Saiba Mais</a>
                        </li>
                        <li class="professor">
                            <img src="images/usuario.png" alt="Foto do professor" class="imgProfessor">
                            <h1 id="nomeProfessor">Nome do Professor</h1>
                            <a id="saibaMais" href="google.com">Saiba Mais</a>
                        </li>
                        <li class="professor">
                            <img src="images/usuario.png" alt="Foto do professor" class="imgProfessor">
                            <h1 id="nomeProfessor">Nome do Professor</h1>
                            <a id="saibaMais" href="google.com">Saiba Mais</a>
                        </li>
                        <li class="professor">
                            <img src="images/usuario.png" alt="Foto do professor" class="imgProfessor">
                            <h1 id="nomeProfessor">Nome do Professor</h1>
                            <a id="saibaMais" href="google.com">Saiba Mais</a>
                        </li>
                        <li class="professor">
                            <img src="images/usuario.png" alt="Foto do professor" class="imgProfessor">
                            <h1 id="nomeProfessor">Nome do Professor</h1>
                            <a id="saibaMais" href="google.com">Saiba Mais</a>
                        </li>
                        <li class="professor">
                            <img src="images/usuario.png" alt="Foto do professor" class="imgProfessor">
                            <h1 id="nomeProfessor">Nome do Professor</h1>
                            <a id="saibaMais" href="google.com">Saiba Mais</a>
                        </li>
                        <li class="professor">
                            <img src="images/usuario.png" alt="Foto do professor" class="imgProfessor">
                            <h1 id="nomeProfessor">Nome do Professor</h1>
                            <a id="saibaMais" href="google.com">Saiba Mais</a>
                        </li>
                    </ul>
                </div>
        </section>
    </main>
</body>
<script src="/aluno/js/menuOpenClose.js"></script>
<?php include_once "includes/modalNotificar.php"; ?>

</html>