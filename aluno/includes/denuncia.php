<?php

session_start();

require_once "../../conexao.php";

$tipo = $_POST['tipoDenuncia'];

$comentario = $_POST['comentario'];

$id_aluno = $_SESSION['id'];

$data = date('Ymd');

$comando1 = "INSERT into alerta (id_aluno, id_professor, data_alerta, motivo_alerta, info_alerta) 
             values ($id_aluno, '".$_SESSION['id_professor']."', $data, '$tipo', '$comentario')";
$msquery1 = mysqli_query($sql, $comando1);

$prof = "SELECT nome_professor FROM professor WHERE id_professor = '".$_SESSION['id_professor']."'";
$verify_prof = mysqli_query($sql,$prof);
$prof = mysqli_fetch_assoc($verify_prof);
$prof = $prof['nome_professor'];

$notificar = "INSERT INTO notifica (id_professor, id_aluno, texto_notifica, verifica_notifica) VALUES( '3', '".$id_aluno."', 'O aluno ".$_SESSION['nome']." de id: ".$_SESSION['id'].", denunciou o professor ".$prof." de id: ".$_SESSION['id_professor']." pelo motivo: ".$tipo."', '1')";
$noti = mysqli_query($sql,$notificar) or die (mysqli_error($sql));
if($noti){
    echo $prof;
    header('Location: ../professor.php?id='.$_SESSION['id_professor']);
}else{
    $_SESSION['msg'] = 'Erro ao mandar a notificação';
}
?>