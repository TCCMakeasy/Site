<?php

session_start();

if (!isset($_SESSION['id'])) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../aluno/login.php");
}else{
    require_once "../../conexao.php";
    $id = $_SESSION['id'];
    $delete = "DELETE FROM aluno WHERE id_aluno = '$id'";
    $result = mysqli_query($sql, $delete);
    if($result){
        //Conta excluída com sucesso
        session_destroy();
        header("Location: ../login.php");
    }else{
        $_SESSION['msg'] = "Erro ao excluir conta";
        header("Location: ../infos.php");
    }
}

?>
