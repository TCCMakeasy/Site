<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['verify'] != 1) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../professor/login.php");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do Administrador</title>
    <link rel="stylesheet" type="text/css" href="./styles/estiloEditInfos.css">
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />
</head>
<script>
    const dateMax = () => {
        let dataAtual = new Date();
        let dia = dataAtual.getDate();
        let mes = dataAtual.getMonth() + 1;
        let ano = dataAtual.getFullYear();
        if (dia < 10) {
            dia = "0" + dia;
        }
        if (mes < 10) {
            mes = "0" + mes;
        }
        let dataMax = (ano - 12) + "-" + mes + "-" + dia;
        let dataMin = (ano - 100) + "-" + mes + "-" + dia;
        let dataInput = document.getElementById("dataNascInput");
        dataInput.setAttribute("max", dataMax);
        dataInput.setAttribute("min", dataMin);

    }

    const alerta = () => alert("<?php if (isset($_SESSION['msg'])) {echo $_SESSION['msg'];} ?>");

    const loaded = () => {
        alerta();
        dateMax();
    }

    String.prototype.reverse = function() {
        return this.split("").reverse().join("");
    };

    function mascaraMoeda(campo, evento) {
        var tecla = !evento ? window.event.keyCode : evento.which;
        var valor = campo.value.replace(/[^\d]+/gi, "").reverse();
        var resultado = "";
        var mascara = "###.###,##".reverse();
        for (var x = 0, y = 0; x < mascara.length && y < valor.length;) {
            if (mascara.charAt(x) != "#") {
                resultado += mascara.charAt(x);
                x++;
            } else {
                resultado += valor.charAt(y);
                y++;
                x++;
            }
        }
        campo.value = resultado.reverse();
    }
</script>

<body onload="<?php if (isset($_SESSION['msg'])) {
                    echo 'loaded()';
                } else {
                    echo 'dateMax()';
                } ?>">
    <?php include_once "./includes/menuAdm.php"; ?>
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
                    <div id="divId" class="divInputText">
                        <p id="idTitulo" class="tituloForm">ID:</p>
                        <input id="idInput" class="inputLock" type="text" name="id" value="<?php echo $_SESSION['id'] ?>" value="" disabled>
                    </div>
                    <div id="divNome" class="divInputText">
                        <p id="nomeTitulo" class="tituloForm">Nome:</p>
                        <p class="inputP"><input id="nomeInput" class="inputText" type="text" maxlength="50" name="nome" value="<?php echo $_SESSION['nome'] ?>"><img src="./images/edit.png" alt="label Editável" class="editImg"></p>
                    </div>
                    <div id="divEmail" class="divInputText">
                        <p id="emailTitulo" class="tituloForm">Email:</p>
                        <p class="inputP"><input id="emailInput" class="inputText" name="email" type="email" value="<?php echo $_SESSION['email'] ?>"><img src="./images/edit.png" class="editImg"></p>
                    </div>
                    <div id="divSenha" class="divInputText">
                        <p id="senhaTitulo" class="tituloForm">Senha:</p>
                        <p class="inputP"><input id="senhaInput" class="inputText" name="senha" type="password" placeholder="●●●●●●●●"><img src="./images/hide.png" alt="label Editável" class="editImg" id="show-hide" onclick="showHidePassword()"></p>
                    </div>
                    <div id="divTelefone" class="divInputText">
                        <p id="telefoneTitulo" class="tituloForm">Telefone:</p>
                        <p class="inputP"><input id="telefoneInput" class="inputText" type="tel" name="telefone" placeholder="(99)99999-9999" maxlength="15" onkeyup="handlePhone(event)" value="<?php echo $_SESSION['telefone'] ?>"><img src="./images/edit.png" alt="label Editável" class="editImg"></p>
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
                        <p class="inputP"><input id="dataNascInput" class="inputText" type="date" name="data" value="<?php echo date('Y-m-d',  strtotime($_SESSION['data'])); ?>"><img src="./images/edit.png" class="editImg"></p>
                    </div>
                    <div id="divValor" class="divInputText">
                        <p id="valorTitulo" class="tituloForm">Preço (R$):</p>
                        <p class="inputP"><input id="valorInput" class="inputText" name="valor" value="<?php if(!empty($_SESSION['valor'])){echo number_format($_SESSION['valor'],2,",",".");} ?>" onKeyUp="mascaraMoeda(this, event)" maxlength="10"><img src="./images/edit.png" class="editImg"></p>
                    </div>
                    <div id="divDesc">
                        <p id="descTitulo" class="tituloForm">Biografia:</p>
                        <textarea id="descInput" class="inputText" rows="5" maxlength="500" name="bio"><?php echo $_SESSION['bio'] ?></textarea>
                    </div>
                    <div id="divBtn">
                        <input id="btnSalvar" class="btn" type="submit" value="Salvar" onclick="return confirmEdit();">
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

    const confirmEdit = () => {
        return confirm('Tem certeza que quer salvar suas informações?');
    }

    const showHidePassword = () => {
        if (document.querySelector('#senhaInput').value != '') {
            document.querySelector('#senhaInput').type = document.querySelector('#senhaInput').type === 'password' ? 'text' : 'password';
            document.querySelector('#show-hide').src = document.querySelector('#senhaInput').type === 'password' ? './images/hide.png' : './images/show.png';
        }

    }
</script>
<script src="./js/menuOpenClose.js"></script>
<?php include_once "includes/modalNotificar.php";
unset($_SESSION['msg']) ?>

</html>