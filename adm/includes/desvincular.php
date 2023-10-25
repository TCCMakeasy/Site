<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 3) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../professor/login.php");
} else {
    require_once("../../conexao.php");
    $idAluno = $_GET['id'];
    $desvincularProfessor = "UPDATE aluno SET id_professor = NULL WHERE id_aluno = '$idAluno'";
    $resultDesvincularProfessor = mysqli_query($sql, $desvincularProfessor);
    if ($resultDesvincularProfessor) {
        $_SESSION['msg'] = "Aluno desvinculado com sucesso!";
        header("Location: ../adm_alunos.php");

        $notificar = "INSERT INTO notifica (texto_notifica, id_professor, id_aluno, verifica_notifica) VALUES('O professor ".$_SESSION['nome']." te desvinculou dele', '".$_SESSION['id']."', '".$idAluno."', '0')";
		$noti = mysqli_query($sql,$notificar) or die($sql);
		if ($noti){
			$_SESSION['msg'] = "Aluno desvinculado com sucesso!";
			header("Location: ../adm_alunos.php");
		}
		else {
			$_SESSION['msg'] = "Erro ao desvincular o aluno";
			header("Location: ../adm_alunos?=".$idAluno.".php");
		}

        $data = date('m');

        $select = "SELECT * from armazena where mensal_armazena = $data";
        $selectComando = mysqli_query($sql, $select);

        $select1 = "SELECT * from armazena where id_professor = ".$_SESSION['id']."";
        $selectComando1 = mysqli_query($sql, $select1);

        
        if(mysqli_num_rows($selectComando1) > 0){
            $altera = "update armazena set perdidos_armazena = (perdidos_armazena + 1) where id_professor = ".$_SESSION['id']."";
            $alteraFinal = mysqli_query($sql, $altera);
        }else{

        $armazena = "INSERT into armazena(id_professor,perdidos_armazena, mensal_armazena) values (".$_SESSION['id'].", perdidos_armazena + 1, $data)";
        $armazenaFinal = mysqli_query($sql, $armazena);

        }


    } else {
        $_SESSION['msg'] = "Erro ao desvincular aluno";
        header("Location: ../adm_alunos.php");
    }
}
?>