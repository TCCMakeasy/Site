<?php
    session_start();
    require_once '../../conexao.php';
    $id = $_POST['idEdit'];
    $nome_edit = $_POST['nomeValor'];
    $valor_edit = $_POST['valorValor'];
    $mensal_edit = $_POST['mensal'];
    if($mensal_edit == TRUE){
        $seleciona = "SELECT * FROM financeiro WHERE id_professor = '".$_SESSION['id']."'";
        $resultado_seleciona = mysqli_query($sql, $seleciona);
        if($resultado_seleciona){
            $edita = "UPDATE financeiro SET nome_financeiro = '".$nome_edit."' AND valor_financeiro = '".$valor_edit."' WHERE id_financeiro = '".$id."'";
        }
    }else{
        $mes_edit = $_POST['mesValor'];
        $seleciona = "SELECT * FROM financeiro WHERE id_financeiro = '".$id."'";
        $resultado_seleciona = mysqli_query($sql, $seleciona);
        if($resultado_seleciona){
            $edita = "UPDATE financeiro SET nome_financeiro = '".$nome_edit."' AND valor_financeiro = '".$valor_edit."' AND mes_financeiro '".$mes_edit."' WHERE id_financeiro = '".$id."'";
        }
    }
?>