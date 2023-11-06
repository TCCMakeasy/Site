<?php
session_start();    
require_once("../../conexao.php");
$hndl = fopen("php://input", "r");
$id_avalia = fread($hndl, 1024);
$apagar = "DELETE FROM avalia WHERE id_aluno = '".$_SESSION['id']."'";
$result_apagar = mysqli_query($sql, $apagar) or die($sql);
if($result_apagar){
    $_SESSION['msg'] = 'Nota excluída com sucesso';
    header("Location: ../gerenciarProfessor.php");
}else{
    $_SESSION['msg'] = 'Erro ao excluir a nota';
    header("Location: ../gerenciarProfessor.php");
}
?>