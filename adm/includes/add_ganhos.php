<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 3) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../../professor/login.php");
} else { 
require_once "../../conexao.php";
$ganho_preco = $_POST['inputvalorGanho'];
$ganho_nome = $_POST['inputnomeGanho'];
$ganho_mensal = $_POST['inputMensal'];
$ganho_mes = $_POST['inputMes'];
if ($ganho_mensal == TRUE){
    $ganho = "INSERT INTO financeiro (preco_financeiro, tipo_financeiro, mensal_financeiro, id_professor, nome_financeiro) VALUES = ('".$ganho_preco."', '1', '1' '".$_SESSION['id']."','".$ganho_nome."')";
    $ganho_inseri = mysqli_query($sql, $ganho);
    if($ganho_inseri){
        $_SESSION['msg'] = 'foi porra';
        header("Location: ../adm_financeiro.php");
    }else{        
    $_SESSION['msg'] = 'não foi porra com mensal';
    header("Location: ../adm_financeiro.php");
    }
}else{
    $ganho = "INSERT INTO financeiro (preco_financeiro, tipo_financeiro, mes_financeiro, mensal_financeiro, id_professor, nome_financeiro) VALUES = ('".$ganho_preco."', '1', '".$ganho_mes."', '0', '".$_SESSION['id']."','".$ganho_nome."')";
    $ganho_inseri = mysqli_query($sql, $ganho);
    if($ganho_inseri){
        $_SESSION['msg'] = 'foi porra';
        header("Location: ../adm_financeiro.php");
    }else{        
    $_SESSION['msg'] = 'não foi porra sem mensal';
    header("Location: ../adm_financeiro.php");
    }
}
}
?>