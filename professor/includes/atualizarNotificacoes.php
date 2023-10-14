<?php
include_once("../../conexao.php");
$idProfessor = $_GET['id_professor'];
$result_notifica = "SELECT * FROM notifica where id_professor = '" . $idProfessor . "' AND verifica_notifica = '1'";
$resultado_notify = mysqli_query($sql, $result_notifica);
$notifys = array();
if($resultado_notify){
    while ($row_usuario = mysqli_fetch_assoc($resultado_notify)) {
        $notifys[] = $row_usuario;
    }
    echo json_encode($notifys);
}
else{
    echo "404";
}
