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
        $_SESSION['msg'] = "Aluno desvinculado com sucesso!";
        header("Location: ../alunos.php");
        
        $data = date('m');

        $select = "SELECT * from armazena where mensal_armazena = $data";
        $selectComando = mysqli_query($sql, $select);

        $select1 = "SELECT * from armazena where id_professor = ".$_SESSION['id']."";
        $selectComando1 = mysqli_query($sql, $select1);	
        
        if(mysqli_num_rows($selectComando1) > 0 && (mysqli_num_rows($selectComando) > 0)){

            $altera = "update armazena set perdidos_armazena = (perdidos_armazena + 1) where id_professor = ".$_SESSION['id']." AND mensal_armazena = $data";
            $alteraFinal = mysqli_query($sql, $altera);

        }else{

        $armazena = "INSERT into armazena(id_professor, perdidos_armazena, mensal_armazena) values ( ".$_SESSION['id']." ,perdidos_armazena + 1, $data)";
        $armazenaFinal = mysqli_query($sql, $armazena);

        }

    } else {
        $_SESSION['msg'] = "Erro ao desvincular aluno";
        header("Location: ../alunos.php");
    }
}
?>