<?php
include_once '../../conexao.php';
$hndl = fopen("php://input", "r");
$id_professor = fread($hndl, 1024);
$resultados = array(); // Inicializa um array para armazenar os resultados

// Loop pelos meses do ano
for ($mes = 1; $mes <= 12; $mes++) {
    $catchValues = "SELECT * FROM armazena WHERE id_professor = '" . $id_professor . "' AND mensal_armazena = " . $mes;
    $sql_catchValues = mysqli_query($sql, $catchValues);
    if (mysqli_num_rows($sql_catchValues) == 0) {
        // Se não existir registro para o mês, adiciona um registro com valor zero
        $resultados[] = array("mensal_armazena" => "$mes", "perdidos_armazena" => 0, "novos_armazena" => 0);
    } else {
        while ($catchValues_assoc = mysqli_fetch_assoc($sql_catchValues)) {
            $resultados[] = $catchValues_assoc; // Adiciona cada resultado encontrado ao array
        }
    }
}

if (count($resultados) == 0) {
    echo json_encode(array("erro" => "Nenhum resultado encontrado"));
} else {
    echo json_encode($resultados); // Retorna todos os resultados como JSON
}
