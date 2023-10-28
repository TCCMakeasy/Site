<?php
if (!isset($_POST['email']) || empty($_POST['email'])) {
    $email = "matslife057@gmail.com";
} else {
    $email = $_POST['email'];
}
require_once '../../conexao.php';
$token = md5(rand(0, 9999) . rand(0, 9999) . rand(0, 9999) . rand(0, 9999));
$verifyEmail = $sql->query("SELECT * FROM aluno WHERE email_aluno = '$email'");
$verifyEmail = $verifyEmail->fetch_assoc();
if ($verifyEmail == null) {
    echo "<script>alert('Email não cadastrado!');window.location.href='../cadastro.php';</script>";
    exit();
} else {

    $subject = 'Recuperação de conta Makeasy!';
    $message = file_get_contents('http://localhost/aluno/includes/email.php?nome=' . $verifyEmail['nome_aluno'] . '&token=' . $token . '&email=' . $email . '');
    $headers = "From: tccmakeasy@gmail.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";

    $mailSender = mail($email, $subject, $message, $headers);
    if ($mailSender) {
        //echo "<script>alert('Email enviado com sucesso!');window.location.href='../login.php';</script>";
    } else {
        echo "<script>alert('Erro ao enviar email!');window.location.href='../login.php';</script>";
    }
}
