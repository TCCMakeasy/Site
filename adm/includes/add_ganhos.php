<?php
foreach ($_POST as $key => $value) {
    if (empty($value)) {
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Preencha todos os campos!</div>";
        header("Location: ../adm_financeiro.php");
    }
}
session_start();
if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 3) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../../professor/login.php");
}
require_once "../../conexao.php";
$ganho_preco = $_POST['valorGanho'];
$ganho_preco = str_replace(".", "", $ganho_preco);
$ganho_preco = str_replace(",", ".", $ganho_preco);
$ganho_nome = $_POST['nomeGanho'];
$ganho_mes = $_POST['mesGanho'];
$ganho2 = "INSERT INTO financeiro (tipo_financeiro, nome_financeiro, preco_financeiro, mes_financeiro, id_professor) Values('1', '" . $ganho_nome . "', '" . $ganho_preco . "', '" . $ganho_mes . "', '" . $_SESSION['id'] . "')";
$ganho_inseri2 = mysqli_query($sql, $ganho2) or die(mysqli_error($sql));
if ($ganho_inseri2) {
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Dados salvos com sucesso!</div>";
    header("Location: ../adm_financeiro.php");
} else {
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao salvar dados, tente novamente mais tarde!</div>";
    header("Location: ../adm_financeiro.php");
}
