<?php
    require_once "../../conexao.php";
    $texto = $_POST['text'];
    echo $texto;
    $procura = "SELECT * from professor where nome_professor LIKE $texto";
    $mysql = mysqli_query($sql, $procura);
    $row_pesquisa = mysqli_fetch_assoc($mysql);


?>