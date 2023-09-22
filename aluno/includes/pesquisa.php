<?php
    require_once "../../conexao.php";
    $hndl = fopen("php://input", "r");
    $texto = fread($hndl, 1024);
    $procura = "SELECT * from professor where nome_professor LIKE '%".$texto."%'";
    $mysql = mysqli_query($sql, $procura);
    $row_pesquisa = mysqli_fetch_assoc($mysql);
    echo json_encode($row_pesquisa);

?>