<?php
session_start();    
require_once("../../conexao.php");
$id_avalia = $_GET['id_aluno'];
$idProf = $_GET['id_professor'];
$apagar = "DELETE FROM avalia WHERE id_aluno = '".$id_avalia."'";
$result_apagar = mysqli_query($sql, $apagar) or die($sql);
if($result_apagar){
    $_SESSION['msg'] = 'Nota excluída com sucesso';
    header("Location: ../gerenciarProfessor.php?id=".$idProf);
}else{
    $_SESSION['msg'] = 'Erro ao excluir a nota';
    header("Location: ../gerenciarProfessor.php?id=".$idProf);
}
?>