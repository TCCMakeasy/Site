<?php
require_once "../../conexao.php";
$nome = $_POST['nomeProf'];
$senha = $_POST['senhaProf'];
$email = $_POST['emailProf'];
$inseri = "INSERT INTO professor (email_professor, nome_professor, senha_professor) VALUES ('".$email."', '".$nome."', '".$senha."')";
$verifica = mysqli_query($sql, $inseri);
if($verifica){
    echo 'Professor adicionado com sucesso';
    //header("Location: ../users.php");
}else{
    echo 'Erro ao adicionar professor, tente novamente mais tarde';
    //header("Location: ../users.php");
}
?>