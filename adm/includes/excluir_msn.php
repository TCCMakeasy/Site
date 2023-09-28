<?php
session_start();    
require_once("../../conexao.php");
$id_notifica = $_GET['id_notifica'];
$apagar = "DELETE FROM notifica WHERE id_professor = '".$_SESSION['id']."' AND id_notifica = '$id_notifica'";
$result_apagar = mysqli_query($sql, $apagar);
if($result_apagar){
    $_SESSION['msg'] = "Apagado com sucesso";
    echo "<script>window.history.back();</script>";
}
else{
    $_SESSION['msg'] = "Erro";
    echo "<script>window.history.back();</script>";
}
?>