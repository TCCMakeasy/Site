<?php
require_once '../../conexao.php'; 
$id = filter_input(INPUT_POST, 'btnAddAluno', FILTER_DEFAULT);
if($id){
    $result_id = "select id_aluno from aluno where id_alunos= '$id' LIMIT 1";
    $resultado_id = mysqli_query($sql, $result_id);
    if($resultado_id){
    }
}else{
    $_SESSION['msg'] = "<texto>id incorreto</texto>";
    header("Location: ../natan_alunos.php");
}
?>