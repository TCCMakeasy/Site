<?php
    session_start();
    require_once '../../conexao.php';
    $nome_edit = $_POST['nomeValor'];
    $valor_edit = $_POST['valorValor'];
    $mensal_edit = $_POST['mensal'];
    if($mensal_dit == TRUE){
        $seleciona = "SELECT * FROM financeiro WHERE id_professor = '".$_SESSION['id']."'";
        $resultado_seleciona = mysqli_query($sql, $seleciona);
        if($resultado_seleciona){
            
        }
    }else{
        $mes_edit = $_POST['mesValor'];
        $seleciona = "SELECT * FROM financeiro WHERE id_professor = '".$_SESSION['id']."'";
        $resultado_seleciona = mysqli_query($sql, $seleciona);
        if($resultado_seleciona){

        }
    }
?>