<?php
session_start();    
include_once("../../conexao.php");
$apagar = "UPDATE notifica SET texto_notifica = '' WHERE id_aluno = '".$_SESSION['id']."'";
$result_apagar = mysqli_query($sql, $apagar);
if($result_apagar){
    $_SESSION['msg'] = "Apagado com sucesso";
    
}
else{
    $_SESSION['msg'] = "Erro";
}
?>