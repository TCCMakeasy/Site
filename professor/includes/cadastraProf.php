<?php
header("Access-Control-Allow-Origin: *");
header('Cache-Control: no-cache, must-revalidate'); 
header("Content-Type: text/plain; charset=UTF-8");
header("HTTP/1.1 200 OK");
require_once '../../conexao.php';
$dados = file_get_contents("php://input");
$dados = json_decode($dados);
$customer = $dados->Customer;
$nome = $customer->full_name;
$email = $customer->email;
$senha = bin2hex(random_bytes(3));
$senhaBD = password_hash($senha, PASSWORD_DEFAULT);
$inseri = "INSERT INTO professor(email_professor, nome_professor, senha_professor) VALUES ('".$email."', '".$nome."', '".$senhaBD."')";
$verify = mysqli_query($sql, $inseri) or die($sql);
if($verify){
    echo "Deu certo";
    //MANDAR EMAIL PARA MUDAR A SENHA
}else{
    echo "Deu errado";
}
?>