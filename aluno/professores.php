<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suas Informações</title>
    <link rel="stylesheet" type="text/css" href="style/estiloPadrao.css">
    <link rel="stylesheet" type="text/css" href="style/estiloMenuAluno.css">
    <link rel="stylesheet" type="text/css" href="style/estiloProfessores.css">
</head>
<body>
    <?php include_once "includes/menuAluno.php"; ?>
    <main>
        <section>
        <h1 id="title">Professores</h1>
            <div id="container">
                <iframe src="professoresDisponiveis.php" frameborder="0"></iframe>
            </div>
        </section>
    </main>
</body>
</html>