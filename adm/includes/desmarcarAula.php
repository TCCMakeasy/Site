<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 3) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../../professor/login.php");
} else if (isset($_POST)) {
    require_once "../../conexao.php";
    $data = file_get_contents('php://input');
    $data = explode(':', $data);
    $dia = $data[0];
    $horario = $data[1];
    $request = "UPDATE cronograma SET `" . $dia . "_cronograma` = NULL WHERE id_professor = '" . $_SESSION['id'] . "' AND tempo_cronograma = '" . $horario . ":00:00'";
    if (mysqli_query($sql, $request)) {
        echo "Aula desmarcada com sucesso!";
    } else {
        echo "Erro ao desmarcar aula, tente novamente mais tarde!";
    }
}
