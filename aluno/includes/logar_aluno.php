<?php
    include_once "../../conexao.php";
    $acessar = filter_input(INPUT_POST, 'entrar', FILTER_DEFAULT);

    if($acessar){
        $email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);

        if((!empty($email)) and (!empty($senha))){
            $result_email = "select id_aluno, nome_aluno, email_aluno, senha_aluno from aluno where email_aluno= '$email' LIMIT 1";
            $resultado_email = mysqli_query($sql, $result_email);
            if($resultado_email){
                $row_email = mysqli_fetch_assoc($resultado_email);
                if(password_verify($senha, $row_email['senha_aluno'])){
                    $_SESSION['id'] = $row_email['id_aluno'];
                    $_SESSION['nome'] = $row_email['nome_aluno'];
                    $_SESSION['email'] = $row_email['email_aluno'];
                    header("Location: ../edit_infos.php");
                }else{
                    $_SESSION['msg'] = "<texto>Senha incorreta</texto>";
                    header("Location: ../login.php");
                }
            }
        }else{
            $_SESSION['msg'] = "<texto>Email incorreto</texto>";
            header("Location: ../login.php");
        }
    }else{
        $_SESSION['msg'] = "<texto>Página não encontrada</texto>";
        header("Location: ../login.php");
    }
?>