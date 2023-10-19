<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 1) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../aluno/login.php");
} else {
    require_once "../../conexao.php";

    $idAluno = $_SESSION['id'];

    $aulaHora = $_POST['aulaHora'];

    switch($_POST['aulaDia']){
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

    $verificaAluno = "SELECT id_professor FROM aluno WHERE id_aluno = '$idAluno'";
    $resultado_verificaAluno = mysqli_query($sql, $verificaAluno);
    $result = mysqli_fetch_assoc($resultado_verificaAluno);

    if ($result['id_professor'] === $_SESSION['id_professor']) {
        $notificar = "INSERT INTO notifica (texto_notifica, id_professor, id_aluno, verifica_notifica) VALUES('".$_SESSION['nome']."[ID:" .$_SESSION['id']."] pediu a marcação de uma aula para a ".$aulaDia." ás ".$aulaHora." horas', '".$_SESSION['id_professor']."', '".$idAluno."', '1')";
		$noti = mysqli_query($sql,$notificar);
		if ($noti){
			$_SESSION['msg'] = "Professor notificado, espere até seu professor confirmar!";
			header("Location: ../cronograma.php");
		}
		else {
			$_SESSION['msg'] = "Erro ao marcar aula";
			header("Location: ../cronograma.php");
		}
    } else {
        $_SESSION['msg'] = "Esse professor não é seu";
        header("Location: ../cronograma.php");
    }
}