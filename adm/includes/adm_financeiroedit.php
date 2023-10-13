<?php
    session_start();
    require_once '../../conexao.php';
    var_dump($_POST);
    $id = $_POST['idValor'];
    $nome_edit = $_POST['nomeEdit'];
    $valor_edit = $_POST['valorEdit'];
    $mensal_edit = isset($_POST['mensal'])?true:false;
    if($mensal_edit == TRUE){
        $seleciona = "SELECT * FROM financeiro WHERE id_professor = '".$_SESSION['id']."'";
        $resultado_seleciona = mysqli_query($sql, $seleciona);
        if($resultado_seleciona){
            $edita = "UPDATE financeiro SET nome_financeiro = '".$nome_edit."' AND valor_financeiro = '".$valor_edit."' WHERE id_financeiro = '".$id."'";
        }
    }else{
        $mes_edit = $_POST['inputMes'];
        $seleciona = "SELECT * FROM financeiro WHERE id_financeiro = '".$id."'";
        $resultado_seleciona = mysqli_query($sql, $seleciona);
        if($resultado_seleciona){
            $edita = "UPDATE financeiro SET nome_financeiro = '".$nome_edit."' AND valor_financeiro = '".$valor_edit."' AND mes_financeiro '".$mes_edit."' WHERE id_financeiro = '".$id."'";
        }
    }

//TODO Excluir valor financeiro e fazer o edit funcionar