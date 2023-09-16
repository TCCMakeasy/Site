<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 2) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../professor/login.php");
} else {
    require_once("../../conexao.php");
    $idAluno = $_GET['id'];
    $desvincularProfessor = "UPDATE aluno SET id_professor = NULL WHERE id_aluno = '$idAluno'";
    $resultDesvincularProfessor = mysqli_query($sql, $desvincularProfessor);
    if ($resultDesvincularProfessor) {
        $_SESSION['msg'] = "Aluno desvinculado com sucesso";
        header("Location: ../alunos.php");
    } else {
        $_SESSION['msg'] = "Erro ao desvincular aluno";
        header("Location: ../alunos.php");
    }
}
?>