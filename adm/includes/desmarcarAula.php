<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['verify'] != 1) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../../professor/login.php");
} else if (isset($_POST)) {
    require_once "../../conexao.php";
    $data = file_get_contents('php://input');
    $data = explode(':', $data);
    $dia = $data[0];
    $horario = $data[1];
    switch($dia){
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
    $request = "UPDATE cronograma SET `" . $dia . "_cronograma` = NULL WHERE id_professor = '" . $_SESSION['id'] . "' AND tempo_cronograma = '" . $horario . ":00:00'";
    if (mysqli_query($sql, $request)) {
        echo "Horário desmarcado com sucesso!";
    } else {
        echo "Erro ao desmarcar aula, tente novamente mais tarde!";
    }

}