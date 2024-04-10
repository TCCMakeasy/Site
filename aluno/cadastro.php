<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro</title>
  <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />
  <link rel="stylesheet" type="text/css" href="styles/estiloLoginCadastro.css" />
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
    let dataInput = document.getElementById("data");
    dataInput.setAttribute("max", dataMax);
    dataInput.setAttribute("min", dataMin);

  }
</script>

<body onload="dateMax()">
  <header>
    <a href="../index.html" class="seta">
      <img id="voltar" src="./images/voltarseta.png" alt="Seta para voltar" />
    </a>
    <img src="./images/logo.png" alt="Logo da empresa" id="logo" />
    <a id="span"></a>
  </header>
  <main>
    <form method="POST" id="cadastro">
      <fieldset id="fieldsetCad">
        <h1 id="tituloCad">Cadastro</h1>
        <label for="nome" class="tituloInputCad">Nome Completo:</label>
        <input type="text" name="nome" id="nome" maxlength="50" class="inputCad" placeholder="Albert Flores" required />

        <label for="email" class="tituloInputCad">Email:</label>
        <input type="email" name="email" id="email" maxlength="50" class="inputCad" placeholder="deanna.curtis@example.com" required />

        <label for="senha" class="tituloInputCad">Senha:</label>
        <input type="password" name="senha" id="senha" class="inputCad" placeholder="●●●●●●●●" required />

        <label for="data" class="tituloInputCad">Data de nascimento:</label>
        <input type="date" name="data" id="data" class="inputCad" required />

        <div id="alert" class="avisos"></div>
        <div id="sucesso" class="avisos"></div>

        <input type="submit" value="Cadastrar-se" id="botaoSubmit" name="btnCad" /><br />
        <p id="loginHref">
          Já possui uma conta? <a href="login.php">Entre</a>
        </p>
      </fieldset>
    </form>
    <script src="./js/ajaxCad.js"></script>
  </main>
</body>

</html>