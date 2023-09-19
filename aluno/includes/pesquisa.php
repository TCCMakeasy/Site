<?php


    require_once "../../conexao.php";

    $procura = "SELECT * from professor where nome_professor LIKE $pesquisa";

    $mysql = mysqli_query($sql, $procura);


?>