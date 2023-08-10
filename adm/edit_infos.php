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
        <section id="tela">
            <h1 id="title">Suas Informações</h1>
            <form id="formInfos">
                <section id="editFoto">
                    <img src="./images/nathan.png" id="fotoPerfil" accept="./images/*">
                    <label for="inputFoto" id="labelInputFoto"><img id="imgLabelInput" src="./images/edit.png" alt="Botão para editar Foto de Perfil"></label>
                    <input type="file" id="inputFoto">
                </section>
                <section id="editInfos">
                    <div id="divNome" class="divInputText">
                        <p id="nomeTitulo" class="tituloForm">Nome:</p>
                        <input id="nomeInput" class="inputLock" type="text" disabled>
                    </div>
                    <div id="divId" class="divInputText">
                        <p id="idTitulo" class="tituloForm">ID:</p>
                        <input id="idInput" class="inputLock" type="text" value="" disabled>
                    </div>
                    <div id="divEmail" class="divInputText">
                        <p id="emailTitulo" class="tituloForm">Email:</p>
                        <p class="inputP"><input id="emailInput" class="inputText" type="text"><img src="./images/edit.png"></p>
                    </div>
                    <div id="divSenha" class="divInputText">
                        <p id="senhaTitulo" class="tituloForm">Senha:</p>
                        <p class="inputP"><input id="senhaInput" class="inputText" type="password"><img src="./images/edit.png"></p>
                    </div>
                    <div id="divDataNasc" class="divInputText">
                        <p id="dataNascTitulo" class="tituloForm">Data de Nascimento:</p>
                        <input id="dataNascInput" class="inputLock" type="text" value="" disabled>
                    </div>
                </section>
            </form>
        </section>
    </main>
</body>

</html>