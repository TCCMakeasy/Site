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
  <link rel="stylesheet" type="text/css" href="styles/estiloLoginCadastro.css" />
  <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />
</head>

<body>
  <header>
    <a>
      <img id="voltar" src="./images/voltarseta.png" alt="Seta para voltar" />
    </a>
    <img src="./images/logo.png" alt="Logo da empresa" id="logo" />
    <a id="span"></a>
  </header>
  <main>
    <form method="post" id="cadastro" action="../aluno/includes/logar_aluno.php">
      <fieldset id="fieldsetLogin">
        <h1 id="tituloLogin">Aluno</h1>

        <label for="email" class="tituloInputLogin">Email:</label>
        <input type="email" name="email_login" id="email" class="inputLogin" placeholder="deanna.curtis@example.com" required />

        <label for="senha" class="tituloInputLogin">Senha:</label>
        <input type="password" name="senha_login" id="senha" class="inputLogin" placeholder="●●●●●●●●" required />
        <div id="alert" class="avisos"><?php if (isset($_SESSION['msg'])) {echo $_SESSION['msg'];} ?></div>
        <input type="submit" value="Entrar" id="botaoSubmit" name="entrar" />
        <p id="loginHref">
          Não tem uma conta? <a href="cadastro.php">Registre-se</a>
          <br>
          <a href="cadastro.php">Esqueceu sua senha?</a>
        </p>
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