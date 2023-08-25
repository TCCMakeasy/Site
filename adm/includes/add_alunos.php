<?php
require_once '../../conexao.php'; 
$id = filter_input(INPUT_POST, 'btnAddAluno', FILTER_DEFAULT);
$verificaprofessor = "SELECT id_professor FROM aluno WHERE id_aluno = '$id'";
$resultado_verificaprofessor = mysqli_query($sql, $verificaid);
echo $verificaid;
if ($resultado_verificaid){
	echo "esse aluno já tem um professor";
}else{
	$id = $sql-->("SELECT id_aluno FROM aluno WHERE id_aluno = '$id'");
	if($verificaid[0] = 0){
		echo "esse aluno não existe";
	}else{
		$sql-->("insert into sala (id_aluno) values ('".$id_aluno."')");
	}
}
?>