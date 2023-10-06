<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 1) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../aluno/login.php");
} else if (isset($_POST)) {
    require_once "../../conexao.php";
    $data = file_get_contents('php://input');
    $data = explode(':', $data);
    $aulaDia = $data[0];
    $horario = $data[1];
	switch($aulaDia){
		case "seg":
			$aulaDia = "Segunda-Feira";
			break;
		case "ter":
			$aulaDia = "Terça-Feira";
			break;
		case "qua":
			$aulaDia = "Quarta-Feira";
			break;
		case "qui":
			$aulaDia = "Quinta-Feira";
			break;
		case "sex":
			$aulaDia = "Sexta-Feira";
			break;
		case "sab":
			$aulaDia = "Sábado";
			break;
		case "dom":
			$aulaDia = "Domingo";
			break;
	}
    
    $notificar = "INSERT INTO notifica (texto_notifica, id_professor, id_aluno, verifica_notifica) VALUES('".$_SESSION['nome']." pediu para desmarcar a aula de ".$aulaDia." às ".$horario.":00 horas', '".$_SESSION['id_professor']."', '".$_SESSION['id']."', '1')";
	$noti = mysqli_query($sql,$notificar);
		if ($noti){
			echo "1";
			exit();
		}
		else {
			echo "2";
			exit();
		}
}
