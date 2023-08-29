<?php
require_once '../../conexao.php'; 
$id = filter_input(INPUT_POST, 'btnAddAluno', FILTER_DEFAULT);
$verificaprofessor = "SELECT id_professor FROM aluno WHERE id_aluno = '$id'";
$resultado_verificaprofessor = mysqli_query($sql, $verificaprofessor);
print_r($resultado_verificaprofessor);
if ($resultado_verificaprofessor){
	echo "Esse aluno já tem um professor";
}else{
	$verificaid = "SELECT id_aluno FROM aluno WHERE id_aluno = '$id'";
	$resultado_verificaid = mysqli_query($sql, $verificaid);
	if($verificaid[0] = 0){
		echo "Esse aluno não existe";
	}else{
		$insertAluno = "INSERT into aluno (id_professor) values ('".$_SESSION['id']."')";
		$result_insertAluno = mysqli_query($sql, $insertAluno);
		if($result_insertAluno){
			$_SESSION['msg'] = "Aluno cadastrado com sucesso!";
		}else{
			$_SESSION['msg'] = "Erro ao conectar o aluno";
		}
	}
}
?>