<?php
$btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario', FILTER_DEFAULT);
if($btnCadAluno){
    include_once '.\conexao.php';
    $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $dados_st = array_map('strip_tags', $dados_rc);
	$dados = array_map('trim', $dados_st);

    if(!$erro){
		//var_dump($dados);
		$dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
		
		$result_usuario = "INSERT INTO usuarios (nome, email, usuario, senha) VALUES (
						'" .$dados['senha_aluno']. "',
						'" .$dados['email_aluno']. "',
						'" .$dados['nome_aluno']. "',
						'" .$dados['nascimento_aluno']. "'
						)";
		$resultado_usario = mysqli_query($sql, $result_usuario);
	}
}
?>