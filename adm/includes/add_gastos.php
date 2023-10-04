<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 3) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../../professor/login.php");
} else { 
require_once "../../conexao.php";
$gasto_preco = $_POST['valorGasto'];
$gasto_nome = $_POST['nomeGasto'];
$gasto_mensal = $_POST['mensal'];
if ($gasto_mensal == TRUE){
    $gasto = "INSERT INTO financeiro (tipo_financeiro, nome_financeiro, preco_financeiro, mensal_financeiro) Values('2', '".$gasto_nome."', '".$gasto_preco."', '1')";
    $gasto_inseri = mysqli_query($sql, $gasto) or die (mysqli_error($sql));
    if($gasto_inseri){
        $_SESSION['msg'] = 'Dados salvos com sucesso';
        header("Location: ../adm_financeiro.php");
    }else{
    $_SESSION['msg'] = 'Erro ao salvar dados, tente novamente mais tarde';
    header("Location: ../adm_financeiro.php");
    }
}else{
    $gasto_mes = $_POST['mesGasto'];
    $gasto2 = "INSERT INTO financeiro (tipo_financeiro, nome_financeiro, preco_financeiro, mes_financeiro, mensal_financeiro) Values('2', '".$gasto_nome."', '".$gasto_preco."', '".$gasto_mes."', '0')";
    $gasto_inseri2 = mysqli_query($sql, $gasto2);
    if($gasto_inseri2){
        $_SESSION['msg'] = 'Dados salvos com sucesso';
        header("Location: ../adm_financeiro.php");
    }else{      
    $_SESSION['msg'] = 'Erro ao salvar dados, tente novamente mais tarde';
    header("Location: ../adm_financeiro.php");
    }
}
}
?>