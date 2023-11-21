<?php
foreach ($_POST as $key => $value) {
    if (empty($value)) {
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Preencha todos os campos!</div>";
        header("Location: ../financeiro.php");
    }
}
session_start();
if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 3) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../../professor/login.php");
}
require_once "../../conexao.php";
$gasto_preco = $_POST['valorGasto'];
$gasto_preco = str_replace(".", "", $gasto_preco);
$gasto_preco = str_replace(",", ".", $gasto_preco);
$gasto_nome = $_POST['nomeGasto'];
$gasto_mes = $_POST['mesGasto'];
$gasto2 = "INSERT INTO financeiro (tipo_financeiro, nome_financeiro, preco_financeiro, mes_financeiro, id_professor) Values('2', '" . $gasto_nome . "', '" . $gasto_preco . "', '" . $gasto_mes . "', '" . $_SESSION['id'] . "')";
$gasto_inseri2 = mysqli_query($sql, $gasto2);
if ($gasto_inseri2) {
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Dados salvos com sucesso!</div>";
    header("Location: ../financeiro.php");
} else {
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao salvar dados, tente novamente mais tarde!</div>";
    header("Location: ../financeiro.php");
}
