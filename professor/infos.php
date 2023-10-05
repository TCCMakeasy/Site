<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 2) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../professor/login.php");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do Professor</title>
    <link rel="stylesheet" type="text/css" href="./styles/estiloPadrão.css">
    <link rel="stylesheet" type="text/css" href="./styles/estiloEditInfos.css">
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />
</head>

<body>
    <?php include_once "./includes/menuProfessor.php"; ?>
    <main>
        <section id="tela">
            <h1 id="title">Suas Informações</h1>
            <form id="formInfos" method="POST" action="./includes/edit_infos.php" enctype="multipart/form-data">
                <section id="editFoto">
                    <img src="../fotosPerfil/<?php echo $_SESSION['foto'] ?>" id="fotoPerfil" accept="./images/*">
                    <label for="inputFoto" id="labelInputFoto"><img id="imgLabelInput" src="./images/edit.png" alt="Botão para editar Foto de Perfil"></label>
                    <input type="file" id="inputFoto" name="fotoPerfil">
                </section>
                <section id="editInfos">
                    <div id="divNome" class="divInputText">
                        <p id="nomeTitulo" class="tituloForm">Nome:</p>
                        <input id="nomeInput" class="inputLock" type="text" name="nome" value="<?php echo $_SESSION['nome'] ?>" disabled>
                    </div>
                    <div id="divId" class="divInputText">
                        <p id="idTitulo" class="tituloForm">ID:</p>
                        <input id="idInput" class="inputLock" type="text" name="id" value="<?php echo $_SESSION['id'] ?>" value="" disabled>
                    </div>
                    <div id="divEmail" class="divInputText">
                        <p id="emailTitulo" class="tituloForm">Email:</p>
                        <p class="inputP"><input id="emailInput" class="inputText" name="email" type="email" value="<?php echo $_SESSION['email'] ?>"><img src="./images/edit.png" id="editImg"></p>
                    </div>
                    <div id="divSenha" class="divInputText">
                        <p id="senhaTitulo" class="tituloForm">Senha:</p>
                        <p class="inputP"><input id="senhaInput" class="inputText" name="senha" type="password" placeholder="●●●●●●●●"><img src="./images/edit.png" id="editImg"></p>
                    </div>
                    <div id="divTelefone" class="divInputText">
                        <p id="telefoneTitulo" class="tituloForm">Telefone:</p>
                        <p class="inputP"><input id="telefoneInput" class="inputText" type="tel" name="telefone" placeholder="(99)99999-9999" maxlength="15" onkeyup="handlePhone(event)" value="<?php echo $_SESSION['telefone'] ?>"><img src="./images/edit.png" alt="label Editável" id="editImg"></p>
                    </div>
                    <script>
                        const handlePhone = (event) => {
                            let input = event.target
                            input.value = phoneMask(input.value)
                        }

                        const phoneMask = (value) => {
                            if (!value) return ""
                            value = value.replace(/\D/g, '')
                            value = value.replace(/(\d{2})(\d)/, "($1) $2")
                            value = value.replace(/(\d)(\d{4})$/, "$1-$2")
                            return value
                        }
                    </script>
                    <div id="divDataNasc" class="divInputText">
                        <p id="dataNascTitulo" class="tituloForm">Data de Nascimento:</p>
                        <input id="dataNascInput" class="inputLock" type="text" name="data" value="<?php echo date('d/m/Y',  strtotime($_SESSION['data'])); ?>" disabled>
                    </div>
                    <div id="divValor" class="divInputText">
                        <p id="valorTitulo" class="tituloForm">Preço:</p>
                        <p class="inputP"><input id="valorInput" class="inputText" type="number" name="valor" value="<?php echo $_SESSION['valor'] ?>"><img src="./images/edit.png" id="editImg"></p>
                    </div>
                    <div id="divDesc">
                        <p id="descTitulo" class="tituloForm">Biografia:</p>
                        <textarea id="descInput" class="inputText" rows="5" name="bio"><?php echo $_SESSION['bio'] ?></textarea>
                    </div>
                    <div id="divBtn">
                        <input id="btnSalvar" class="btn" type="submit" value="Salvar">
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
<script src="./js/addAlunoOpenClose.js"></script>
<script src="./js/menuOpenClose.js"></script>
<?php include_once "includes/modalNotificar.php"; 
unset($_SESSION['msg'])?>

</html>