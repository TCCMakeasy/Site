<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 1) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../aluno/login.php");
} else {
    require_once "../../conexao.php";

    $idAluno = $_SESSION['id'];

    $aulaDia = $_POST['aulaDia'];

    $aulaHora = $_POST['aulaHora'];

    $verificaAluno = "SELECT id_professor FROM aluno WHERE id_aluno = '$idAluno'";
    $resultado_verificaAluno = mysqli_query($sql, $verificaAluno);
    $result = mysqli_fetch_assoc($resultado_verificaAluno);

    if ($result['id_professor'] === $_SESSION['id_professor']) {
        $sqlCheck = "SELECT * FROM cronograma WHERE tempo_cronograma = '$aulaHora' AND id_professor = '" . $_SESSION['id_professor'] . "'";
        $result =   mysqli_query($sql, $sqlCheck);
        $resultCheck = mysqli_fetch_assoc($result);
        if($resultCheck[$aulaDia.'_cronograma'] == "privado" || $resultCheck[$aulaDia.'_cronograma'] != null){
            $_SESSION['msg'] = "Esse horário já está ocupado";
            header("Location: ../cronograma.php");
        }else{
        if ($result->num_rows > 0) {
            $sqlUpdate = "UPDATE cronograma SET " . $aulaDia . "_cronograma = '$idAluno' WHERE tempo_cronograma = '$aulaHora' AND id_professor = '" . $_SESSION['id_professor'] . "'";
            if ($sql->query($sqlUpdate) === TRUE) {
                header("Location: ../cronograma.php");
            } else {
                echo "Erro ao atualizar registro: " . $sql->error;
            }
        } else {
            $sqlInsert = "INSERT INTO cronograma (" . $aulaDia . "_cronograma, tempo_cronograma, id_professor) VALUES ('$idAluno', '$aulaHora', '" . $_SESSION['id_professor'] . "')";
            if ($sql->query($sqlInsert) === TRUE) {
                header("Location: ../cronograma.php");
            } else {
                echo "Erro ao inserir registro: " . $sql->error;
            }
        }
        $sql->close();
    }} else {
        $_SESSION['msg'] = "Esse aluno não é seu";
        header("Location: ../alunos.php");
    }
}
