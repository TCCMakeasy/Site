<?php
session_start();
require_once "../../conexao.php";
$nota = $_POST['rating'];
$desc = $_POST['comentario'];
$avalia = "INSERT INTO avalia (desc_avalia, id_professor, id_aluno, nota_avalia) VALUES ('".$desc."', '".$_SESSION['id_professor']."', '".$_SESSION['id']."', '".$nota."')";
$avalia_inseri = mysqli_query($sql, $avalia) or die (mysqli_error($sql));
if($avalia_inseri){
    $_SESSION['msg'] = 'Nota posta';
    header("Location: ../professor.php?id=".$_SESSION['id_professor']);
}
else{
    $_SESSION['msg'] = 'Erro ao dar nota';
    header("Location: ../professor.php".$_SESSION['id_professor']);
}
?>