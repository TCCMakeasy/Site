<?php

    require_once '../../conexao.php'; 
    $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $idAluno = $_POST['idAluno'];

    $aulaDia = $_POST['aulaDia'];

    $aulaHora = $_POST['aulaHora'];

    $mysql = "INSERT INTO cronograma ('ter_cronograma', 'tempo_cronograma') values ('$aulaDia', '$aulaHora')"
   

?>