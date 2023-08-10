<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do Administrador</title>
    <link rel="stylesheet" type="text/css" href="./styles/estiloPadrão.css">
    <link rel="stylesheet" type="text/css" href="./styles/estiloEditInfos.css">
</head>
<body>
    <?php include_once "./includes/menuAdm.php"; ?>
    <main>
        <section>
             <h1 id="title">Suas Informações</h1>
             <form>
             <div id="editFoto">
                <img src="./images/nathan.png" id="fotoPerfil" accept="./images/*">
                <label for="inputFoto" id="labelInputFoto"><img id="imgLabelInput" src="./images/edit.png" alt="Botão para editar Foto de Perfil"></label>
                <input type="file" id="inputFoto">
             </div>
             <div id="editInfos">
                <p>Nome:</p>
             </div>
             </form>
        </section>
    </main>
</body>
</html>