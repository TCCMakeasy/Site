<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 1) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../aluno/login.php");
} else {
    require_once("../../conexao.php");
    $idAluno = $_GET['id'];
    $desvincularProfessor = "UPDATE aluno SET id_professor = NULL WHERE id_aluno = '$idAluno'";
    $resultDesvincularProfessor = mysqli_query($sql, $desvincularProfessor);
    if ($resultDesvincularProfessor) {
        $_SESSION['msg'] = "Professor desvinculado com sucesso!";
        header("Location: ../professores.php");

        $data = date('m');

        $notificar = "INSERT INTO notifica (texto_notifica, id_professor, id_aluno, verifica_notifica) VALUES('O aluno ".$_SESSION['nome']." se desvinculou de você', '".$_SESSION['id_professor']."', '".$idAluno."', '1')";
		$noti = mysqli_query($sql,$notificar);
		if ($noti){
			$_SESSION['msg'] = "Desvinculado com sucesso";
			header("Location: ../professores.php");
		}
		else {
			$_SESSION['msg'] = "Erro ao mandar a notificação";
			header("Location: ../professor?=".$_SESSION['id_professor'].".php");
		}

        $select = "SELECT * from armazena where mensal_armazena = $data";
        $selectComando = mysqli_query($sql, $select);

        $select1 = "SELECT * from armazena where id_professor = ".$_SESSION['id_professor']."";
        $selectComando1 = mysqli_query($sql, $select1);	
        
        if(mysqli_num_rows($selectComando1) > 0 && (mysqli_num_rows($selectComando) > 0)){

            $altera = "update armazena set perdidos_armazena = (perdidos_armazena + 1) where id_professor = ".$_SESSION['id_professor']." AND mensal_armazena = $data";
            $alteraFinal = mysqli_query($sql, $altera);

        }else{

        $armazena = "INSERT into armazena(id_professor, perdidos_armazena, mensal_armazena) values ( ".$_SESSION['id_professor']." ,perdidos_armazena + 1, $data)";
        $armazenaFinal = mysqli_query($sql, $armazena);

        }

        $exclui = "DELETE from financeiro where nome_financeiro like '%$idAluno%'";
        $excluiFinal = mysqli_query($sql, $exclui);

        $_SESSION['id_professor'] = NULL;

    } else {
        $_SESSION['msg'] = "Erro ao desvincular professor";
        header("Location: ../professor.php?id=".$_SESSION['id']."");
    }
}
?>