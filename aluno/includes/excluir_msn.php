<?php
session_start();    
require_once("../../conexao.php");
$hndl = fopen("php://input", "r");
$id_notifica = fread($hndl, 1024);
if($id_notifica == "all"){
    $apagar = "DELETE FROM notifica WHERE id_aluno = '".$_SESSION['id']."'";
}else{
    $apagar = "DELETE FROM notifica WHERE id_aluno = '".$_SESSION['id']."' AND id_notifica = '$id_notifica'";
}
$result_apagar = mysqli_query($sql, $apagar);
if($result_apagar){
    echo 200;
}
else{
    echo 404;
}
?>