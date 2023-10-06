<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 3) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../../professor/login.php");
} else {
    require_once "../../conexao.php";

    $idAluno = $_POST['idAluno'];

    $aulaDia = $_POST['aulaDia'];
    
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

    $aulaHora = $_POST['aulaHora'];
    $verificaAluno = "SELECT id_professor FROM aluno WHERE id_aluno = '$idAluno'";
    $resultado_verificaAluno = mysqli_query($sql, $verificaAluno);
    $result = mysqli_fetch_assoc($resultado_verificaAluno);

    if ($result['id_professor'] === $_SESSION['id']) {
        $sqlCheck = "SELECT * FROM cronograma WHERE tempo_cronograma = '$aulaHora' AND id_professor = '" . $_SESSION['id'] . "'";
        $resultCheck = $sql->query($sqlCheck);

        if ($resultCheck->num_rows > 0) {
            $sqlUpdate = "UPDATE cronograma SET " .$_POST['aulaDia']. "_cronograma = '$idAluno' WHERE tempo_cronograma = '$aulaHora' AND id_professor = '" . $_SESSION['id'] . "'";
            if ($sql->query($sqlUpdate) === TRUE) {
                header("Location: ../adm_cronograma.php");
                $notificar = "INSERT INTO notifica (texto_notifica, id_professor, id_aluno, verifica_notifica) VALUES('Uma aula foi marcada pelo professor ".$_SESSION['nome']."  para ".$aulaDia." às ".$aulaHora." horas', '".$_SESSION['id']."', '".$idAluno."', '0')";
				$noti = mysqli_query($sql,$notificar);
				if ($noti){
                    $_SESSION['msg'] = "Aula cadastrada com sucesso";
					header("Location: ../adm_cronograma.php");
				}
				else {
					$_SESSION['msg'] = "Erro ao notificar";
					header("Location: ../adm_cronograma.php");
				}
            } else {
                echo "Erro ao atualizar registro: " . $sql->error;
            }
        } else {
            $sqlInsert = "INSERT INTO cronograma (".$aulaDiaData."_cronograma, tempo_cronograma, id_professor) VALUES ('$idAluno', '$aulaHora', '" . $_SESSION['id'] . "')";
            if ($sql->query($sqlInsert) === TRUE) {
                $notificar = "INSERT INTO notifica (texto_notifica, id_professor, id_aluno, verifica_notifica) VALUES('texto_notifica, id_professor, id_aluno, verifica_notifica) VALUES('Uma aula foi marcada ".$aulaDia.", pelo professor ".$_SESSION['nome'].",  para as ".$aulaHora."', '".$_SESSION['id']."', '".$idAluno."', '0')";
				$noti = mysqli_query($sql,$notificar);
				if ($noti){
                    $_SESSION['msg'] = "Aula cadastrada com sucesso";
					header("Location: ../adm_cronograma.php");
				}
				else {
					$_SESSION['msg'] = "Erro ao notificar";
					header("Location: ../adm_cronograma.php");
				}
            } else {
                echo "Erro ao inserir registro: " . $sql->error;
            }
        }
        $sql->close();
    } else {
        $_SESSION['msg'] = "Esse aluno não é seu";
        header("Location: ../alunos.php");
    }
}
