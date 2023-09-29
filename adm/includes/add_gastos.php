<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 3) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../../professor/login.php");
} else { 
require_once "../../conexao.php";
$gasto_preco = $_POST['inputvalorGasto'];
$gasto_nome = $_POST['inputnomeGastos'];
$gasto_mensal = $_POST['inputMensal'];
if ($gasto_mensal = TRUE){
    $gasto = "INSERT INTO financeiro (preco_financeiro, tipo_financeiro, mensal_financeiro, id_professor, nome_financeiro) VALUES = ('".$gasto_preco."', '0', '1' '".$_SESSION['id']."','".$gasto_nome."')";
}else{
    $gasto = "INSERT INTO financeiro (preco_financeiro, tipo_financeiro, mes_financeiro, mensal_financeiro, id_professor, nome_financeiro) VALUES = ('".$gasto_preco."', '0', ''0', '".$_SESSION['id']."','".$gasto_nome."')";
}
}
?>