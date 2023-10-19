<?php

require_once "../../conexao.php";

$hndl = fopen("php://input", "r");
$ValorPesquisa = fread($hndl, 1024);
$pesquisa = "SELECT * from alerta where id_professor = '".$ValorPesquisa."'";
$ato = mysqli_query($sql, $pesquisa);
$array = array();

while($dados = mysqli_fetch_array($ato)):
        $array[] = utf8_encode($dados);
endwhile;

if (count($array) == 0) {
    echo json_encode(array("erro" => "Nenhum resultado encontrado"));
}else{
    echo json_encode($array);
}
?>