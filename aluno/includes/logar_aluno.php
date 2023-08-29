<?php
session_start();
require_once "../../conexao.php";
$acessar = filter_input(INPUT_POST, 'entrar', FILTER_DEFAULT);

if ($acessar) {
    $email = filter_input(INPUT_POST, 'email_login', FILTER_DEFAULT);
    $senha = filter_input(INPUT_POST, 'senha_login', FILTER_DEFAULT);

    if ((!empty($email)) and (!empty($senha))) {
        $result_login = "select id_aluno, nome_aluno, email_aluno, senha_aluno, nascimento_aluno, id_professor, foto_aluno from aluno where email_aluno= '$email' LIMIT 1";
        $resultado_login = mysqli_query($sql, $result_login);
        if ($resultado_login) {
            $row_login = mysqli_fetch_assoc($resultado_login);
            if ($row_login) {
                if (password_verify($senha, $row_login['senha_aluno'])) {
                    $_SESSION['id'] = $row_login['id_aluno'];
                    $_SESSION['nome'] = $row_login['nome_aluno'];
                    $_SESSION['email'] = $row_login['email_aluno'];
                    $_SESSION['data'] = $row_login['nascimento_aluno'];
                    $_SESSION['foto'] = $row_login['foto_aluno'];
                    $_SESSION['id_professor'] = $row_login['id_professor'];
                    unset($_SESSION['msg']);
                    header("Location: ../infos.php");
                } else {
                    $_SESSION['msg'] = "Senha incorreta";
                    $_SESSION['erro'] = true;
                    header("Location: ../login.php");
                }
            } else {
                $_SESSION['msg'] = "Email não encontrado";
                $_SESSION['erro'] = true;
                header("Location: ../login.php");
            }
        } else {
            $_SESSION['msg'] = "Erro. Tente novamente mais tarde";
            $_SESSION['erro'] = true;
            header("Location: ../login.php");
        }
    } else {
        $_SESSION['msg'] = "Preencha todos os campos";
        $_SESSION['erro'] = true;
        header("Location: ../login.php");
    }
} else {
    $_SESSION['msg'] = "Página não encontrada";
    $_SESSION['erro'] = true;
    header("Location: ../login.php");
}

?>