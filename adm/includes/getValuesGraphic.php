<?php

include_once '../../conexao.php';
$catchValues = "SELECT * FROM financeiro WHERE id_professor = '".$id_professor."'";
$sql_catchValues = mysqli_query($sql, $catchValues);
$catchValues_assoc = mysqli_fetch_assoc($sql_catchValues);
json_encode($catchValues_assoc);