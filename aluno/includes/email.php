<?php
$nome = $_GET['nome'];
$token = $_GET['token'];
$email = $_GET['email'];
require_once '../../conexao.php';
?>

<body>


    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center">
                <header style="background-color: rgba(52, 56, 136, 1);color: #fff;padding:0 1rem; width:50%;">
                    <h1>Redefinição de senha</h1>
                </header>
                <main style="background-color: rgba(91, 109, 208, 1);color: #fff;padding: 2rem;font-size: 2rem;width:50%;">
                    <h2>Olá <b><?php echo $nome; ?>.</b></h2>
                    <h3>Para recuperar sua senha, clique no botão abaixo:</h3>
                    <h3><a href="http://localhost/aluno/includes/Recuperar_Senha.php?email=<?php echo $email; ?>&token=<?php echo $token; ?>" class="btn btn-primary">Recuperar senha</a></h3>
                    <h5>Se você não solicitou a redefinição de senha, ignore este e-mail.</h5>
                </main>
                <footer style="background-color: rgba(52, 56, 136, 1);color: #fff;padding:0 0.5rem;width:50%;">
                    <p>Makeasy - 2023</p>
                </footer>
            </td>
        </tr>
    </table>

</body>