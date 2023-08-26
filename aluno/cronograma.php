<?php
session_start();

if (!isset($_SESSION['id'])) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../aluno/login.php");
}
?>