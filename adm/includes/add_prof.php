<?php
require_once "../../conexao.php";
$nome = $_POST['nomeProf'];
$senha = password_hash($_POST['senhaProf'], PASSWORD_DEFAULT);
$email = $_POST['emailProf'];
$data = $_POST['dataProf'];
$verify = "SELECT email_professor FROM professor WHERE email_professor = '".$email."'";
$verify2 = mysqli_query($sql, $verify);
if (isset($_POST['adm'])){
    if(mysqli_num_rows($verify2) != 0){
        echo 'Este email já está cadastrado';
        header("Location: ../users.php");
    }else{
        $inseri = "INSERT INTO professor (email_professor, nome_professor, senha_professor, nascimento_professor, verifica_adm) VALUES ('".$email."', '".$nome."', '".$senha."', '".$data."', '1')";
        $verifica = mysqli_query($sql, $inseri);
    }
    if($verifica){
        echo 'Professor adicionado com sucesso';
        header("Location: ../users.php");
    }else{
        echo 'Erro ao adicionar professor, tente novamente mais tarde';
        header("Location: ../users.php");
    }
}else{
    if(mysqli_num_rows($verify2) != 0){
        echo 'Este email já está cadastrado';
        header("Location: ../users.php");
    }else{
    $inseri = "INSERT INTO professor (email_professor, nome_professor, senha_professor, nascimento_professor) VALUES ('".$email."', '".$nome."', '".$senha."', '".$data."')";
    $verifica = mysqli_query($sql, $inseri);
    }
    if($verifica){
        echo 'Professor adicionado com sucesso';
        header("Location: ../users.php");
    }else{
        echo 'Erro ao adicionar professor, tente novamente mais tarde';
        header("Location: ../users.php");
    }
}
?>