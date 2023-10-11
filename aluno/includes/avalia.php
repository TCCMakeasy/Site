<?php
session_start();
require_once "../../conexao.php";
$nota = $_POST['rating'];
$desc = $_POST['comentario'];
$avalia = "INSERT INTO avalia (desc_avalia, id_professor, id_aluno, nota_avalia) VALUES ('".$desc."', '".$_SESSION['id_professor']."', '".$_SESSION['id']."', '".$nota."')";
$avalia_inseri = mysqli_query($sql, $avalia);
if($avalia_inseri){
    $verifica_media = "SELECT AVG(nota_avalia) FROM avalia  WHERE id_professor = '".$_SESSION['id_professor']."'";
    $verify_media = mysqli_query($sql, $verifica_media);
    if($verify_media){
        $media = mysqli_fetch_assoc($verify_media);
        $media = $media['AVG(nota_avalia)'];
        echo $media;
        $inseri = "UPDATE professor SET nota_professor = '".$media."' WHERE id_professor = '".$_SESSION['id_professor']."'";
        $inseri2 = mysqli_query($sql, $inseri);
        $_SESSION['msg'] = 'Nota posta';
        header("Location: ../professor.php?id=".$_SESSION['id_professor']);
    }else{
        $_SESSION['msg'] = 'Erro ao dar nota';
        header("Location: ../professor.php".$_SESSION['id_professor']);
    }
}
else{
    $_SESSION['msg'] = 'Erro, tente novamente mais tardeSS';
    header("Location: ../professor.php".$_SESSION['id_professor']);
}
?>