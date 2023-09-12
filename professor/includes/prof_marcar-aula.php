<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 2) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../professor/login.php");
} else {
    require_once "../../conexao.php";

    $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $idAluno = $_POST['idAluno'];

    $aulaDia = $_POST['aulaDia'];

    $aulaHora = $_POST['aulaHora'];

    if ($aulaDia == "Segunda-Feira") {
        $dia = 'seg';
    } else if ($aulaDia == "Terça-Feira") {

        $dia = 'ter';
    } else if ($aulaDia == "Quarta-Feira") {

        $dia = 'qua';
    } else if ($aulaDia == "Quinta-Feira") {

        $dia = 'qui';
    } else if ($aulaDia == "Sexta-Feira") {

        $dia = 'sex';
    } else if ($aulaDia == "Sábado") {

        $dia = 'sab';
    } else if ($aulaDia == "Domingo") {

        $dia = 'dom';
    }

    $sqlCheck = "SELECT * FROM cronograma WHERE tempo_cronograma = '$aulaHora' AND id_professor = '" . $_SESSION['id'] . "'";
    $resultCheck = $sql->query($sqlCheck);
    
    if ($resultCheck->num_rows > 0) {
        // Se o registro já existe, faça uma atualização
        $sqlUpdate = "UPDATE cronograma SET " . $dia . "_cronograma = '$idAluno' WHERE tempo_cronograma = '$aulaHora' AND id_professor = '" . $_SESSION['id'] . "'";
        if ($sql->query($sqlUpdate) === TRUE) {
            echo "Registro atualizado com sucesso.";
        } else {
            echo "Erro ao atualizar registro: " . $sql->error;
        }
    } else {
        // Se o registro não existe, faça uma inserção
        $sqlInsert = "INSERT INTO cronograma (" . $dia . "_cronograma, tempo_cronograma, id_professor) VALUES ('$idAluno', '$aulaHora', '" . $_SESSION['id'] . "')";
        if ($sql->query($sqlInsert) === TRUE) {
            echo "Registro inserido com sucesso.";
        } else {
            echo "Erro ao inserir registro: " . $sql->error;
        }
    }
    $sql->close();
}
