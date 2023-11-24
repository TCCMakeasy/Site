<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['verify'] != 1) {
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
				$notificar = "INSERT INTO notifica (texto_notifica, id_professor, id_aluno, verifica_notifica) VALUES('Você foi adicionado pelo professor ".$_SESSION['nome']."', '".$_SESSION['id']."', '".$id."', '0')";
				$noti = mysqli_query($sql,$notificar);
				if ($noti){
					$_SESSION['msg'] = "Aluno cadastrado com sucesso!";
					header("Location: ../adm_alunos.php");
			
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
						$mes = date('m');

						$cont = $mes;
						//Inserção no Financeiro
						while($cont <= 12){

						switch($cont){
							
							case 1:
								$mensal= "jan";
								break;
							case 2:
								$mensal = "fev";
								break;
							case 3:
								$mensal = "mar";
								break;
							case 4:
								$mensal = "abr";
								break;
							case 5:
								$mensal = "mai";
								break;
							case 6:
								$mensal = "jun";
								break;				
							case 7:
								$mensal= "jul";
								break;
							case 8:
								$mensal = "ago";
								break;
							case 9:
								$mensal = "set";
								break;
							case 10:
								$mensal = "out";
								break;
							case 11:
								$mensal = "nov";
								break;
							case 12:
								$mensal = "dez";
								break;				
							
							}
		

									$cod_Inser = "INSERT into financeiro(tipo_financeiro, nome_financeiro, preco_financeiro, mes_financeiro, id_professor) values (1, 'Pagamento [".$id."]', ".$_SESSION['valor'].", '$mensal', ".$_SESSION['id'].")";
							$Inser = mysqli_query($sql, $cod_Inser);

						$cont = $cont + 1;

					}

				}else {
					$_SESSION['msg'] = "Erro ao conectar o aluno";
					header("Location: ../adm_alunos.php");
				}
			} else {
				$_SESSION['msg'] = "Erro ao conectar o aluno";
				header("Location: ../adm_alunos.php");
			}
		}
	}
}
