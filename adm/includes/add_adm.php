<?php
session_start();
require_once '../../conexao.php';

if (!isset($_SESSION['id']) || $_SESSION['verify'] != 1) {
	$_SESSION['msg'] = "Faça login para acessar o sistema";
	header("Location: ../../professor/login.php");
} else {
    $idProf = $_GET['id_professor'];
    $adm = $_GET['adm'];
    switch ($adm){
        case 1:
            $adm = 0;
            break;
        case 0:
            $adm = 1;
            break;
    }
    $add = "UPDATE professor SET verifica_adm = '".$adm."' WHERE id_professor = '".$idProf."'";
    $add_adm = mysqli_query($sql, $add);
    if($add_adm){
        $_SESSION['msg'] = "Permissão alterada com sucesso";
        header("Location: ../gerenciarProfessor.php?id=".$idProf);
    }
}
?>