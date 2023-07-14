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
                <iframe src="./includes/professoresDisponíveis.php" frameborder="0"></iframe>
            </div>
        </section>
    </main>
</body>
<script src="./js/menuOpenClose.js"></script>
<?php include_once "includes/modalNotificar.php"; ?>
</html>