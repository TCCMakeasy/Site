<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 2) {
	$_SESSION['msg'] = "Faça login para acessar o sistema";
	header("Location: ../professor/login.php");
} else {
	$id = filter_input(INPUT_POST, 'idAluno', FILTER_DEFAULT);
	require_once '../../conexao.php';
	$verificaid = "SELECT id_aluno FROM aluno WHERE id_aluno = '$id'";
	$resultado_verificaid = mysqli_query($sql, $verificaid);
	if ($resultado_verificaid->num_rows == 0) {
		$_SESSION['msg'] = "Esse aluno não existe";
		header("Location: ../alunos.php");
	} else {
		$verificaprofessor = "SELECT id_professor FROM aluno WHERE id_aluno = '$id'";
		$resultado_verificaprofessor = mysqli_query($sql, $verificaprofessor);
		$result = mysqli_fetch_assoc($resultado_verificaprofessor);
		if ($result['id_professor'] != 0) {
			$_SESSION['msg'] = "Esse aluno já tem um professor";
			header("Location: ../alunos.php");
		} else {
			$insertAluno = "UPDATE aluno set id_professor = '" . $_SESSION['id'] . "' WHERE id_aluno = '" . $id . "'";
			$result_insertAluno = mysqli_query($sql, $insertAluno);
			if ($result_insertAluno) {
				$notificar = "INSERT INTO notifica (texto_notifica, id_professor, id_aluno, verifica_notifica) VALUES('Você foi adicionado pelo professor ".$_SESSION['nome']."', '".$_SESSION['id']."', '".$id."', '0')";
				$noti = mysqli_query($sql,$notificar);
				if ($noti){
					$_SESSION['msg'] = "Aluno cadastrado com sucesso!";
					header("Location: ../alunos.php");
					
					$data = date('m');

					$select = "SELECT * from armazena where mensal_armazena = $data";
					$selectComando = mysqli_query($sql, $select);

					$select1 = "SELECT * from armazena where id_professor = ".$_SESSION['id']."";
					$selectComando1 = mysqli_query($sql, $select1);	
					
					if(mysqli_num_rows($selectComando1) > 0 && (mysqli_num_rows($selectComando) > 0)){

						$altera = "update armazena set novos_armazena = (novos_armazena + 1) where id_professor = ".$_SESSION['id']." AND mensal_armazena = $data";
						$alteraFinal = mysqli_query($sql, $altera);
			
					}else{
			
					$armazena = "INSERT into armazena(id_professor, novos_armazena, mensal_armazena) values ( ".$_SESSION['id']." ,novos_armazena + 1, $data)";
					$armazenaFinal = mysqli_query($sql, $armazena);

					}
				}
				else {
					$_SESSION['msg'] = "Erro ao conectar o aluno";
					header("Location: ../alunos.php");
				}
			} else {
				$_SESSION['msg'] = "Erro ao conectar o aluno";
				header("Location: ../alunos.php");
			}
		}
	}
}
