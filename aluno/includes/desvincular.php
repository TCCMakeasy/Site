<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 1) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../aluno/login.php");
} else {
    require_once("../../conexao.php");
    $idAluno = $_GET['id'];
    $desvincularProfessor = "UPDATE aluno SET id_professor = NULL WHERE id_aluno = '$idAluno'";
    $resultDesvincularProfessor = mysqli_query($sql, $desvincularProfessor);
    if ($resultDesvincularProfessor) {
        $_SESSION['msg'] = "Professor desvinculado com sucesso!";
        $_SESSION['id_professor'] = NULL;
        header("Location: ../professores.php");
    } else {
        $_SESSION['msg'] = "Erro ao desvincular professor";
        header("Location: ../professor.php?id=".$_SESSION['id']."");
    }
}
?>