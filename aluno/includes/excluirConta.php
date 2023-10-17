<?php

session_start();

if (!isset($_SESSION['id'])) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../aluno/login.php");
}else{
    require_once "../../conexao.php";
    $id = $_SESSION['id'];
    $hndl = fopen("php://input", "r");
    $id_notifica = fread($hndl, 1024);
    $apagar2 = "DELETE FROM avalia WHERE id_aluno = '".$_SESSION['id']."'";
    $apagar3 = "DELETE FROM alerta WHERE id_aluno = '".$_SESSION['id']."'";
    if($id_notifica == "all"){
        $apagar = "DELETE FROM notifica WHERE id_aluno = '".$_SESSION['id']."'";
    }else{
        $apagar = "DELETE FROM notifica WHERE id_aluno = '".$_SESSION['id']."' AND id_notifica = '$id_notifica'";
    }
    $result_apagar = mysqli_query($sql, $apagar);
    $result_apagar = mysqli_query($sql, $apagar2);
    $result_apagar = mysqli_query($sql, $apagar3);
    if($result_apagar){
        echo 200;
    }
    else{
        echo 404;
    }
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
