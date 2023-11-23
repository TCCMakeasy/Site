<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['verify'] != 1) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../professor/login.php");
} else {
    require_once("../../conexao.php");
    $idAluno = $_GET['id'];
    $sqlSelect = "SELECT * FROM aluno WHERE id_aluno = '$idAluno'";
    $sqlAluno = mysqli_fetch_assoc(mysqli_query($sql, $sqlSelect));

    $sqlDelete = "DELETE FROM aluno WHERE id_aluno = '$idAluno'";
    $imgDelete = "SELECT foto_aluno FROM aluno WHERE id_aluno = '$idAluno'";
    $exclui = "DELETE from financeiro where nome_financeiro like '%$idAluno%'";
    $excluiFinal = mysqli_query($sql, $exclui);
    $img = mysqli_fetch_assoc(mysqli_query($sql, $imgDelete));
    $deleteAluno = mysqli_query($sql, $sqlDelete);
    if ($deleteAluno) {
        if ($img['foto_aluno'] != "usuario.png"){
            unlink("../../fotosPerfil/" . $img['foto_aluno']);
        }
        $_SESSION['msg'] = "Aluno excluído com sucesso!";
        header("Location: ../users.php");
    } else {
        $_SESSION['msg'] = "Erro ao excluir aluno";
        header("Location: ../users.php");
    }
}
?>