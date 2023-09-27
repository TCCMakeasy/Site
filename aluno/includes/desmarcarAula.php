<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 1) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../aluno/login.php");
} else if (isset($_POST)) {
    require_once "../../conexao.php";
    $data = file_get_contents('php://input');
    $data = explode(':', $data);
    $dia = $data[0];
    $horario = $data[1];
    
    $notificar = "INSERT INTO notifica (texto_notifica, id_professor, id_aluno, verifica_notifica) VALUES('O aluno ".$_SESSION['nome']." pediu para desmarcar a aula de ".$dia." para as ".$horario."', '".$_SESSION['id_professor']."', '".$_SESSION['id']."', '1')";
	$noti = mysqli_query($sql,$notificar);
		if ($noti){
			$_SESSION['msg'] = "Professor notificado, espere até seu professor confirmar!";
			header("Location: ../cronograma.php");
		}
		else {
			$_SESSION['msg'] = "Erro ao desmarcar aula";
			header("Location: ../cronograma.php");
		}
}
