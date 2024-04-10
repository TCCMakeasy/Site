<?php
foreach ($_POST as $key => $value) {
    if (empty($value)) {
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Preencha todos os campos!</div>";
        header("Location: ../adm_financeiro.php");
    }
}
session_start();
require_once '../../conexao.php';
$id = $_POST['idValor'];
$nome_edit = $_POST['nomeEdit'];
$valor_edit = $_POST['valorEdit'];
$valor_edit = str_replace(".", "", $valor_edit);
$valor_edit = str_replace(",", ".", $valor_edit);
$mes_edit = isset($_POST['inputMes']) ? $_POST['inputMes'] : NULL;
$tipoExec = $_POST['btnEdValor'];

if ($tipoExec == 'Editar valor') {
    $exec = "UPDATE `financeiro` SET `nome_financeiro` = '$nome_edit', `preco_financeiro` = '$valor_edit', `mes_financeiro` = '$mes_edit' WHERE `id_financeiro` = $id";
    $query = mysqli_query($sql, $exec);
    if ($query) {
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Valor editado com sucesso!</div>";
        header("Location: ../adm_financeiro.php");
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao editar valor!</div>";
        header("Location: ../adm_financeiro.php");
    }
} else if ($tipoExec == 'Excluir valor') {
    $exec = "DELETE FROM `financeiro` WHERE `id_financeiro` = $id";
    $query = mysqli_query($sql, $exec);
    if ($query) {
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Valor excluido com sucesso!</div>";
        header("Location: ../adm_financeiro.php");
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao excluir valor!</div>";
        header("Location: ../adm_financeiro.php");
    }
}

//TODO Excluir valor financeiro e fazer o edit funcionar