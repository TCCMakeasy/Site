<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 3) {
	$_SESSION['msg'] = "Faça login para acessar o sistema";
	header("Location: ../../professor/login.php");
} else {
	$id = filter_input(INPUT_POST, 'idAluno', FILTER_DEFAULT);
	require_once '../../conexao.php';
	$verificaid = "SELECT id_aluno FROM aluno WHERE id_aluno = '$id'";
	$resultado_verificaid = mysqli_query($sql, $verificaid);
	if ($resultado_verificaid->num_rows == 0) {
		$_SESSION['msg'] = "Esse aluno não existe";
		header("Location: ../adm_alunos.php");
	} else {
		$verificaprofessor = "SELECT id_professor FROM aluno WHERE id_aluno = '$id'";
		$resultado_verificaprofessor = mysqli_query($sql, $verificaprofessor);
		$result = mysqli_fetch_assoc($resultado_verificaprofessor);
		if ($result['id_professor'] != 0) {
			$_SESSION['msg'] = "Esse aluno já tem um professor";
			header("Location: ../adm_alunos.php");
		} else {
			$insertAluno = "UPDATE aluno set id_professor = '" . $_SESSION['id'] . "' WHERE id_aluno = '" . $id . "'";
			$result_insertAluno = mysqli_query($sql, $insertAluno);
			if ($result_insertAluno) {
				$_SESSION['msg'] = "Aluno cadastrado com sucesso!";
				header("Location: ../adm_alunos.php");
			} else {
				$_SESSION['msg'] = "Erro ao conectar o aluno";
				header("Location: ../adm_alunos.php");
			}
		}
	}
}
