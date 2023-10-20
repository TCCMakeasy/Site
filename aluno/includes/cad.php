<?php
    require_once '../../conexao.php'; 
    $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);


	$erro = false;

    $dados_st = array_map('strip_tags', $dados_rc);
	$dados = array_map('trim', $dados_st);
	
	if(in_array('',$dados)){
		$erro = true;
		echo "Necessário preencher todos os campos";
	}elseif((strlen($dados['senha'])) < 6){
		$erro = true;
		echo "A senha deve ter no minímo 6 caracteres";
	}elseif(stristr($dados['senha'], "&")) {
		$erro = true;
		echo "Carácter ( & ) utilizado na senha é inválido";
	}elseif (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
		$erro = true;
		echo "E-mail inválido";
		
	}else{
		$result_usuario = "SELECT id_aluno FROM aluno WHERE id_aluno='". $dados['nome'] ."'";
		$resultado_usuario = mysqli_query($sql, $result_usuario);
		$result_usuario = "SELECT id_aluno FROM aluno WHERE email_aluno='". $dados['email'] ."'";
		$resultado_usuario = mysqli_query($sql, $result_usuario);
		if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
			$erro = true;
			echo "Este e-mail já está cadastrado";
		}
	}

    if(!$erro){
		$dados['senha_criptografada'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
		$dados['nome'] = ltrim(ucfirst($dados['nome']), " \t\n" ); // converte data para o formato do banco de dados [ano-mês-dia
	
		$result_usuario = "INSERT INTO aluno (senha_aluno, email_aluno, nome_aluno, nascimento_aluno) VALUES (
						'" .$dados['senha_criptografada']. "',
						'" .$dados['email']. "',
						'" .$dados['nome']. "',
						'" .$dados['data']. "'
						)";
		$resultado_usario = mysqli_query($sql, $result_usuario);
		echo "Cadastrado com sucesso! Redirecionando para a página de login...";

		$data = date('m');

		$select = "SELECT * from armazena where mensal_armazena = $data";
		$selectComando = mysqli_query($sql, $select);

		
		if(mysqli_num_rows($selectComando) > 0){

			$altera = "update armazena set novos_armazena = (novos_armazena + 1) where id_armazena = 3";
			$alteraFinal = mysqli_query($sql, $altera);

		}

		$armazena = "INSERT into armazena(novos_armazena, mensal_armazena) values (novos_armazena + 1, $data)";
		$armazenaFinal = mysqli_query($sql, $armazena);

	}
	
?>