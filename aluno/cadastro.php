<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cadastro</title>
    <link rel="stylesheet" type="text/css" href="styles/estiloPadrão.css" />
    <link
      rel="stylesheet"
      type="text/css"
      href="styles/estiloLoginCadastro.css"
    />
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
      <form method="POST" id="cadastro">
        <fieldset id="fieldsetCad">
          <h1 id="tituloCad">Cadastro</h1>
          <label for="nome" class="tituloInputCad">Nome Completo:</label>
          <input
            type="text"
            name="nome"
            id="nome"
            class="inputCad"
            placeholder="Albert Flores"
            required
          />
          <label for="email" class="tituloInputCad">Email:</label>
          <input
            type="email"
            name="email"
            id="email"
            class="inputCad"
            placeholder="deanna.curtis@example.com"
            required
          />

          <label for="senha" class="tituloInputCad">Senha:</label>
          <input
            type="password"
            name="senha"
            id="senha"
            class="inputCad"
            placeholder="●●●●●●●●"
            required
          />

          <label for="data" class="tituloInputCad">Data de nascimento:</label
          >
          <input
            type="date"
            name="data"
            id="data"
            class="inputCad"
            required
          />

          <div id="alert" class="avisos">EHIHCASHD aihjdfisahdlih liashjdliashdlioh</div>
          <div id="sucesso" class="avisos">EHIHCASHD aihjdfisahdlih liashjdliashdlioh</div>

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
