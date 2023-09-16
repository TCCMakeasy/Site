<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Professor</title>
  <link rel="stylesheet" type="text/css" href="styles/estiloLogin.css" />
  <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />
</head>

<body>
  <header>
    <a href="" class="">
      <img id="voltar" src="./images/voltarseta.png" alt="Seta para voltar" />
    </a>
    <img src="./images/logo.png" alt="Logo da empresa" id="logo" />
    <a id="span"></a>
  </header>
  <main>
    <form method="POST" id="cadastro" action="./includes/logar_prof.php">
      <fieldset id="fieldsetLogin">
        <h1 id="tituloLogin">Professor</h1>

        <label for="email" class="tituloInputLogin">Email:</label><br />
        <input type="email" name="email" id="email" class="inputLogin" placeholder="deanna.curtis@example.com" required /><br />

        <label for="senha" class="tituloInputLogin">Código:</label><br />
        <input type="password" name="senha" id="senha" class="inputLogin" placeholder="●●●●●●●●" required />
        <div id="alert" class="avisos"><?php if (isset($_SESSION['msg'])) {
                                          echo $_SESSION['msg'];
                                        } ?></div>
        <input type="submit" value="Entrar" id="botaoSubmit" name="entrar" /><br />
        <p id="loginHref">
          Não tem uma conta? <a href="https://makeasyenglish.com.br/#toggle-section">Compre um dos nossos cursos</a>
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