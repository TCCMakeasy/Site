<?php

session_start();

header('Location: ../professor.php?id='.$_SESSION['id_professor']);

require_once "../../conexao.php";

$tipo = $_POST['tipoDenuncia'];

$comentario = $_POST['comentario'];

$id_aluno = $_SESSION['id'];

$data = date('Ymd');

$comando = "SELECT id_professor from aluno where id_aluno = ".$id_aluno."";
$msquery = mysqli_query($sql, $comando);
$msfetch = mysqli_fetch_assoc($msquery);
$id_professor = $msfetch['id_professor'];

$comando1 = "INSERT into alerta (id_aluno, id_professor, data_alerta, motivo_alerta, info_alerta) 
             values ($id_aluno, $id_professor, $data, '$tipo', '$comentario')";
$msquery1 = mysqli_query($sql, $comando1);

 

 

?>