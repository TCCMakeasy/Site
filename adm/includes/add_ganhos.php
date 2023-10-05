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
    $ganho = "INSERT INTO financeiro (tipo_financeiro, nome_financeiro, preco_financeiro, mensal_financeiro, id_professor) Values('1', '".$ganho_nome."', '".$ganho_preco."', '1', '".$_SESSION['id']."')";
    $ganho_inseri = mysqli_query($sql, $ganho) or die (mysqli_error($sql));
    if($ganho_inseri){
        $_SESSION['msg'] = 'Dados salvos com sucesso';
        header("Location: ../adm_financeiro.php");
    }else{
    $_SESSION['msg'] = 'Erro ao salvar dados, tente novamente mais tarde';
    header("Location: ../adm_financeiro.php");
    }
}else{
    $ganho_mes = $_POST['mesGanho'];
    $ganho2 = "INSERT INTO financeiro (tipo_financeiro, nome_financeiro, preco_financeiro, mes_financeiro, mensal_financeiro, id_professor) Values('1', '".$ganho_nome."', '".$ganho_preco."', '".$ganho_mes."', '0', '".$_SESSION['id']."')";
    $ganho_inseri2 = mysqli_query($sql, $ganho2) or die (mysqli_error($sql));
    if($ganho_inseri2){
        $_SESSION['msg'] = 'Dados salvos com sucesso';
        header("Location: ../adm_financeiro.php");
    }else{      
    $_SESSION['msg'] = 'Erro ao salvar dados, tente novamente mais tarde';
    header("Location: ../adm_financeiro.php");
    }
}
}
?>