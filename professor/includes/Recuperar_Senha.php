<?php
session_start();
if(isset($_GET['email']) && isset($_GET['token'])){
  $email = $_GET['email'];
  $token = $_GET['token'];
}else{
  echo "<script>alert('Você não tem permissão para entrar nessa página');window.location.href='../login.php';</script>";
}
require_once '../../conexao.php';
$verifyToken = $sql->query("SELECT * FROM recupera where token_recupera = '$token' AND email_recupera = '$email'");
if(mysqli_num_rows($verifyToken) == 0){
  echo "<script>alert('Você não tem permissão para entrar nessa página');window.location.href='../login.php';</script>";
}else{
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Aluno</title>
  <link rel="stylesheet" type="text/css" href="../styles/estiloLogin.css" />
  <link rel="shortcut icon" src="../images/favicon.ico" type="image/x-icon" />
</head>

<body>
  <header>
    <a href="../login.php">
      <img id="voltar" src="../images/voltarseta.png" alt="Seta para voltar" />
    </a>
    <img src="../images/logo.png" alt="Logo da empresa" id="logo" />
    <a id="span"></a>
  </header>
  <main>
    <form method="post" id="cadastro" action="./updateSenha.php?email=<?php echo $email;?>&token=<?php echo $token;?>">
      <fieldset id="fieldsetLogin">
        <h1 id="tituloLogin">Recuperar Senha</h1>
        <label for="senha" class="tituloInputLogin">Digite sua nova senha:</label><br>
        <input type="password" name="senha" id="senha" class="inputLogin" placeholder="●●●●●●●●" required /><br>
        
        <label for="senha" class="tituloInputLogin">Digite novamente:</label><br>
        <input type="password" name="novaSenha" id="senha" class="inputLogin" placeholder="●●●●●●●●" required /><br>
        <div id="alert" class="avisos"><?php if (isset($_SESSION['msg'])) {echo $_SESSION['msg'];} ?></div>

        <input type="submit" value="Mudar Senha" id="botaoSubmitRecuperar" name="SenhaN"/>

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
</html>
<?php
}
unset($_SESSION['msg']);
?>
