<?php

    require_once '../../conexao.php';

    $email = $_GET['email'];
    $token = $_GET['token'];
    $senha = $_POST['senha'];

    $novaSenha = $_POST['novaSenha'];

    if($senha == $novaSenha){

    $novaSenha = password_hash($novaSenha, PASSWORD_DEFAULT);
    $update = "UPDATE aluno set senha_aluno = '$novaSenha' WHERE email_aluno = '$email'";
    $updateSQL = mysqli_query($sql, $update);
    
    header("Location: ../login.php");
    
    }else{

        echo "Senha não é igual";

    }


?>