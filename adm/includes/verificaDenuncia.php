<?php

require_once "../../conexao.php";

$nome = 5;

$hndl = fopen("php://input", "r");
$ValorPesquisa = fread($hndl, 1024);
$pesquisa = "SELECT * from alerta where id_professor = '".$ValorPesquisa."'";
$ato = mysqli_query($sql, $pesquisa);
$array = array();

while($dados = mysqli_fetch_array($ato)):

    $array[] = $dados;

endwhile;
    echo json_encode($array);
?>