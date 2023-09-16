<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 3) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../../professor/login.php");
} else {
    require_once "../../conexao.php";
    $data = file_get_contents('php://input');
    $data = explode(':', $data);
    $dia = $data[0];
    $aulaHora = $data[1] . ":00:00";
    $sqlCheck = "SELECT * FROM cronograma WHERE tempo_cronograma = '$aulaHora' AND id_professor = '" . $_SESSION['id'] . "'";
    $resultCheck = $sql->query($sqlCheck);

    if ($resultCheck->num_rows > 0) {
        $sqlUpdate = "UPDATE cronograma SET " . $dia . "_cronograma = 'privado' WHERE tempo_cronograma = '$aulaHora' AND id_professor = '" . $_SESSION['id'] . "'";
        if ($sql->query($sqlUpdate) === TRUE) {
            echo "Aula privada com sucesso!";
        } else {
            echo "Erro ao atualizar registro: " . $sql->error;
        }
    } else {
        $sqlInsert = "INSERT INTO cronograma (" . $dia . "_cronograma, tempo_cronograma, id_professor) VALUES ('privado', '$aulaHora', '" . $_SESSION['id'] . "')";
        if ($sql->query($sqlInsert) === TRUE) {
            echo "Aula privada com sucesso!";
        } else {
            echo "Erro ao inserir registro: " . $sql->error;
        }
    }
    $sql->close();
}
