<?php
require_once "../../conexao.php";
$nome = $_POST['nomeProf'];
$senha = password_hash($_POST['senhaProf'], PASSWORD_DEFAULT);
$email = $_POST['emailProf'];
$data = $_POST['dataProf'];
if (isset($_POST['adm'])){
    $inseri = "INSERT INTO professor (email_professor, nome_professor, senha_professor, nascimento_professor, verifica_adm) VALUES ('".$email."', '".$nome."', '".$senha."', '".$data."', '1')";
$verifica = mysqli_query($sql, $inseri);
if($verifica){
    echo 'Professor adicionado com sucesso';
    header("Location: ../users.php");
}else{
    echo 'Erro ao adicionar professor, tente novamente mais tarde';
    header("Location: ../users.php");
}
}else{
    $inseri = "INSERT INTO professor (email_professor, nome_professor, senha_professor, nascimento_professor) VALUES ('".$email."', '".$nome."', '".$senha."', '".$data."')";
$verifica = mysqli_query($sql, $inseri);
if($verifica){
    echo 'Professor adicionado com sucesso';
    header("Location: ../users.php");
}else{
    echo 'Erro ao adicionar professor, tente novamente mais tarde';
    header("Location: ../users.php");
}
}
?>