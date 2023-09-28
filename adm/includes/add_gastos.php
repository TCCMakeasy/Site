<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 3) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../../professor/login.php");
} else { 
require_once "../../conexao.php";
$gasto_preco = $_POST['inputvalorGasto'];

$gasto = "INSERT INTO financeiro (entrada_financeiro, id_professor) VALUES = ('".$gasto_preco."', '".$_SESSION['id']."')";
}
?>