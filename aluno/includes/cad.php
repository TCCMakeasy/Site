<?php
$btnCadAluno = filter_input(INPUT_POST, 'btnCad', FILTER_DEFAULT);
if($btnCadAluno){
    require_once '../../conexao.php'; 
    $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);

	$erro = false;

    $dados_st = array_map('strip_tags', $dados_rc);
	$dados = array_map('trim', $dados_st);

	if(in_array('',$dados)){
		$erro = true;
		$_SESSION['msg'] = "Necessário preencher todos os campos";
	}elseif((strlen($dados['senha'])) < 6){
		$erro = true;
		$_SESSION['msg'] = "A senha deve ter no minímo 6 caracteres";
	}elseif(stristr($dados['senha'], "&")) {
		$erro = true;
		$_SESSION['msg'] = "Caracter ( & ) utilizado na senha é inválido";
		
	}else{
		$result_usuario = "SELECT id_aluno FROM aluno WHERE id_aluno='". $dados['nome'] ."'";
		$resultado_usuario = mysqli_query($sql, $result_usuario);
		$result_usuario = "SELECT id_aluno FROM aluno WHERE email_aluno='". $dados['email'] ."'";
		$resultado_usuario = mysqli_query($sql, $result_usuario);
		if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
			$erro = true;
			$_SESSION['msg'] = "Este e-mail já está cadastrado";
		}
		echo $_SESSION['msg'];
	}

    if(!$erro){
		$dados['senha_criptografada'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
		
		$result_usuario = "INSERT INTO aluno (senha_aluno, email_aluno, nome_aluno, nascimento_aluno) VALUES (
						'" .$dados['senha_criptografada']. "',
						'" .$dados['email']. "',
						'" .$dados['nome']. "',
						'" .$dados['data']. "'
						)";
		$resultado_usario = mysqli_query($sql, $result_usuario);
		header('Location: ../login.php');
	}
	
}
?>