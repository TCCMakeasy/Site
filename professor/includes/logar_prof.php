<?php
session_start();
require_once "../../conexao.php";
$dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$dados_st = array_map('strip_tags', $dados_rc);
$dados = array_map('trim', $dados_st);


if (isset($dados)) {
    $email = $dados['email'];
    $senha = $dados['senha'];

    if ((!empty($email)) and (!empty($senha))) {
        $result_login = "select id_professor, bio_professor, valor_professor, nota_professor, email_professor, nome_professor, nascimento_professor, senha_professor, foto_professor from professor where email_professor= '$email' LIMIT 1";
        $resultado_login = mysqli_query($sql, $result_login);
        if ($resultado_login) {
            $row_login = mysqli_fetch_assoc($resultado_login);
            if ($row_login) {
                if (password_verify($senha, $row_login['senha_professor'])) {
                    $_SESSION['id'] = $row_login['id_professor'];
                    $_SESSION['nome'] = $row_login['nome_professor'];
                    $_SESSION['email'] = $row_login['email_professor'];
                    $_SESSION['data'] = $row_login['nascimento_professor'];
                    $_SESSION['foto'] = $row_login['foto_professor'];
                    $_SESSION['nota'] = $row_login['nota_professor'];
                    $_SESSION['valor'] = $row_login['valor_professor'];
                    $_SESSION['bio'] = $row_login['bio_professor'];
                    $_SESSION['tipo'] = 2;
                    unset($_SESSION['msg']);
                    header("Location: ../infos.php");
                } else {
                    $_SESSION['msg'] = "Senha incorreta";
                    header("Location: ../login.php");
                }
            } else {
                $_SESSION['msg'] = "Email não encontrado";
                header("Location: ../login.php");
            }
        } else {
            $_SESSION['msg'] = "Erro. Tente novamente mais tarde";
            header("Location: ../login.php");
        }
    } else {
        $_SESSION['msg'] = "Preencha todos os campos";
        header("Location: ../login.php");
    }
} else {
    $_SESSION['msg'] = "Página não encontrada";
    header("Location: ../login.php");
}

?>