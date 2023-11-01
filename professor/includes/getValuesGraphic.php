<?php
include_once '../../conexao.php';
$hndl = fopen("php://input", "r");
$id_professor = fread($hndl, 1024);
$resultados = array(); // Inicializa um array para armazenar os resultados
$catchValues = "SELECT * FROM financeiro WHERE id_professor = '" . $id_professor . "'";
$sql_catchValues = mysqli_query($sql, $catchValues);
while ($catchValues_assoc = mysqli_fetch_assoc($sql_catchValues)) {
    $resultados[] = $catchValues_assoc; // Adiciona cada resultado encontrado ao array
}
if (count($resultados) == 0) {
    echo json_encode(array("erro" => "Nenhum resultado encontrado"));
}else{
echo json_encode($resultados); // Retorna todos os resultados como JSON
}
?>