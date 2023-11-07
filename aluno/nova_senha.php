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
    <form method="post" id="cadastro" action="../aluno/includes/sendEmail.php">
      <fieldset id="fieldsetLogin">
        <h2 id="tituloLogin">Recuperar Senha</h2>

        <label for="email" class="tituloInputLogin">Digite seu email:</label>
        <input type="email" name="email" id="email" class="inputLogin" placeholder="deanna.curtis@example.com" required />
        <div id="alert" class="avisos"><?php if (isset($_SESSION['msg'])) {echo $_SESSION['msg'];} ?></div>
        <input type="submit" value="Enviar email" id="botaoSubmit" name="entrar" />
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