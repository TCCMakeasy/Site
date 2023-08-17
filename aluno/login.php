<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Aluno</title>
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
      <form method="post" id="cadastro" action="../aluno/includes/logar_aluno.php">
        <fieldset id="fieldsetLogin">
          <h1 id="tituloLogin">Aluno</h1>

          <label for="email" class="tituloInputLogin">Email:</label><br />
          <input
            type="email"
            name="email_login"
            id="email"
            class="inputLogin"
            placeholder="deanna.curtis@example.com"
            required
          /><br />

          <label for="senha" class="tituloInputLogin">Senha:</label><br />
          <input
            type="password"
            name="senha_login"
            id="senha"
            class="inputLogin"
            placeholder="●●●●●●●●"
            required
          />

          <input type="submit" value="Entrar" id="botaoSubmit" name="entrar" /><br />
          <p id="loginHref">
            Não tem uma conta? <a href="cadastrar.html">Registre-se</a>
          </p>
        </fieldset>
      </form>
    </main>
  </body>
</html>
