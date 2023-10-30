<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Aluno</title>
  <link rel="stylesheet" type="text/css" href="../styles/estiloLoginCadastro.css" />
  <link rel="shortcut icon" src="../images/favicon.ico" type="image/x-icon" />
</head>

<body>
  <header>
    <a>
      <img id="voltar" src="../images/voltarseta.png" alt="Seta para voltar" />
    </a>
    <img src="../images/logo.png" alt="Logo da empresa" id="logo" />
    <a id="span"></a>
  </header>
  <main>
    <form method="post" id="cadastro" action="updateSenha.php?email=<?php echo $_GET['email'];?>&token=<?php echo $_GET['token'];?>">
      <fieldset id="fieldsetLogin">
        <h1 id="tituloLogin">Recuperar Senha</h1>

        <label for="senha" class="tituloInputLogin">Digite sua nova senha:</label>
        <input type="password" name="senha" id="senha" class="inputLogin" placeholder="●●●●●●●●" required />

        <label for="senha" class="tituloInputLogin">Digite novamente:</label>
        <input type="password" name="novaSenha" id="senha" class="inputLogin" placeholder="●●●●●●●●" required />
        <div id="alert" class="avisos"><?php if (isset($_SESSION['msg'])) {echo $_SESSION['msg'];} ?></div>

        <input type="submit" value="Mudar Senha" id="botaoSubmit" name="SenhaN"/>

      </fieldset>
    </form>
  </main>
</body>
<script>
  var alert = document.getElementById("alert");
  if (alert.innerHTML != "") {
    alert.style.display = "block";
  }
</script>
<?php
unset($_SESSION['msg']);
?>

</html>