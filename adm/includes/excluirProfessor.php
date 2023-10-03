<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 3) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../professor/login.php");
} else {
    require_once("../../conexao.php");
    $idProfessor = $_GET['id'];
    $sqlSelect = "SELECT * FROM professor WHERE id_professor = '$idProfessor'";
    $sqlAluno = mysqli_fetch_assoc(mysqli_query($sql, $sqlSelect));

    $sqlDelete = "DELETE FROM professor WHERE id_professor = '$idProfessor'";
    $imgDelete = "SELECT foto_professor FROM professor WHERE id_professor = '$idProfessor'";
    $img = mysqli_fetch_assoc(mysqli_query($sql, $imgDelete));
    $deleteProfessor = mysqli_query($sql, $sqlDelete);
    if ($deleteProfessor) {
        if ($img['foto_professor'] != "usuario.png"){
            unlink("../../fotosPerfil/" . $img['foto_professor']);
        }
        $_SESSION['msg'] = "Aluno excluído com sucesso!";
        header("Location: ../users.php");
    } else {
        $_SESSION['msg'] = "Erro ao excluir professor";
        header("Location: ../users.php");
    }
}
?>