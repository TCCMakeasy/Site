<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 1) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../aluno/login.php");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suas Informações</title>
    <link rel="stylesheet" type="text/css" href="./styles/estiloPadrão.css">
    <link rel="stylesheet" type="text/css" href="./styles/estiloEditInfos.css">
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />
</head>

<body>
    <?php include_once "./includes/menuAluno.php"; ?>
    <main>
        <section id="tela">
            <h1 id="title">Suas Informações</h1>
            <form id="formInfos" method="post" action="./includes/edit_infos.php" enctype="multipart/form-data">
                <section id="editFoto">
                    <img src="./fotosPerfil/<?php echo $_SESSION['foto'] ?>" id="fotoPerfil" accept="./images/*">
                    <label for="inputFoto" id="labelInputFoto"><img id="imgLabelInput" src="./images/edit.png" alt="Botão para editar Foto de Perfil"></label>
                    <input type="file" id="inputFoto" name="fotoPerfil">
                </section>
                <section id="editInfos">
                    <div id="divNome" class="divInputText">
                        <p id="nomeTitulo" class="tituloForm">Nome:</p>
                        <input id="nomeInput" class="inputLock" type="text" disabled value="<?php echo $_SESSION['nome'] ?>">
                    </div>
                    <div id="divId" class="divInputText">
                        <p id="idTitulo" class="tituloForm">ID:</p>
                        <input id="idInput" class="inputLock" type="text" value="<?php echo $_SESSION['id'] ?>" disabled>
                    </div>
                    <div id="divEmail" class="divInputText">
                        <p id="emailTitulo" class="tituloForm">Email:</p>
                        <p class="inputP"><input id="emailInput" class="inputText" type="email" name="email" value="<?php echo $_SESSION['email'] ?>"><img src="./images/edit.png" id="editImg"></p>
                    </div>
                    <div id="divSenha" class="divInputText">
                        <p id="senhaTitulo" class="tituloForm">Senha:</p>
                        <p class="inputP"><input id="senhaInput" class="inputText" type="password" name="senha" placeholder="●●●●●●●●"><img src="./images/edit.png" id="editImg"></p>
                    </div>
                    <div id="divDataNasc" class="divInputText">
                        <p id="dataNascTitulo" class="tituloForm">Data de Nascimento:</p>
                        <input id="dataNascInput" class="inputLock" type="text" value="<?php echo date('d/m/Y',  strtotime($_SESSION['data'])); ?>" disabled>
                    </div>
                    <div id="divDesc">
                        <p id="descTitulo" class="tituloForm">Descrição:</p>
                        <textarea id="descInput" class="inputText" rows="5" form="formInfos" name="descInput"><?php echo $_SESSION['desc'] ?></textarea>
                    </div>
                    <div id="divBtn">
                        <input id="btnSalvar" class="btn" type="submit" name="btnSalvar" value="Salvar">
                        <button type="button" id="btnExcluir" class="btn">Excluir</button>
                    </div>
                </section>
            </form>
        </section>
    </main>
</body>
<script>
    fotoForm = document.getElementById("fotoPerfil");
    inputFoto = document.getElementById("inputFoto");
    inputFoto.addEventListener("change", function() {
        fotoForm.src = URL.createObjectURL(event.target.files[0]);
    });
</script>
<script src="./js/excluirConta.js"></script>
<script src="./js/menuOpenClose.js"></script>
<?php include_once "includes/modalNotificar.php"; ?>

</html>