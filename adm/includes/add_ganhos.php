<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 3) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../../professor/login.php");
} else { 
require_once "../../conexao.php";
$ganho_preco = $_POST['valorGanho'];
$ganho_nome = $_POST['nomeGanho'];
$ganho_mensal = $_POST['mensal'];
if ($ganho_mensal == TRUE){
    $ganho = "INSERT INTO financeiro (preco_financeiro, tipo_financeiro, mensal_financeiro, id_professor, nome_financeiro) VALUES ('".$ganho_preco."', '1', '1' '".$_SESSION['id']."','".$ganho_nome."')";
    $ganho_inseri = mysqli_query($sql, $ganho) or die (mysqli_error($sql));
    if($ganho_inseri){
        $_SESSION['msg'] = 'foi porra';
        header("Location: ../adm_financeiro.php");
    }else{
    $_SESSION['msg'] = 'não foi porra com mensal';
    echo $_SESSION['msg'];
    //header("Location: ../adm_financeiro.php");
    }
}else{
    $ganho_mes = $_POST['mesGanho'];
    $ganho2 = "INSERT INTO financeiro (preco_financeiro, tipo_financeiro, mes_financeiro, mensal_financeiro, id_professor, nome_financeiro) VALUES ('".$ganho_preco."', '1', '".$ganho_mes."', '0', '".$_SESSION['id']."','".$ganho_nome."')";
    $ganho_inseri2 = mysqli_query($sql, $ganho);
    if($ganho_inseri2){
        $_SESSION['msg'] = 'foi porra';
        header("Location: ../adm_financeiro.php");
    }else{      
    $_SESSION['msg'] = 'não foi porra sem mensal';
    header("Location: ../adm_financeiro.php");
    }
}
}
?>