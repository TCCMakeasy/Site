<?php
    session_start();
    require_once '../../conexao.php';

    $email = $_GET['email'];
    $token = $_GET['token'];
    $senha = $_POST['senha'];

    $novaSenha = $_POST['novaSenha'];

    if($senha == $novaSenha){

    $novaSenha = password_hash($novaSenha, PASSWORD_DEFAULT);
    $update = "UPDATE aluno set senha_aluno = '$novaSenha' WHERE email_aluno = '$email'";
    $updateSQL = mysqli_query($sql, $update);
    if($updateSQL){
        $excludeRequest = $sql->query("DELETE FROM recupera WHERE token_recupera = '$token' AND email_recupera = '$email'");
        if($excludeRequest){
            header("Location: ../login.php");
        }
    }else{
        $_SESSION['msg'] = "Erro ao atualizar a senha";
        header("Location: ../login.php");
    }
    
    }else{
        $_SESSION['msg'] = "As senhas não coincidem";
        header("Location: ./Recuperar_Senha.php?email=".$email."&token=".$token."");
    }


?>