<?php
    require_once "../../conexao.php";
    $hndl = fopen("php://input", "r");
    $texto = fread($hndl, 1024);
    $texto = strtolower($texto);
    $procura = "SELECT id_aluno, nome_aluno, foto_aluno FROM aluno WHERE LOWER(nome_aluno) LIKE '%" . $texto . "%'";
    $mysql = mysqli_query($sql, $procura);
    $resultados = array(); // Inicializa um array para armazenar os resultados

    while ($row_pesquisa = mysqli_fetch_assoc($mysql)) {
        $resultados[] = $row_pesquisa; // Adiciona cada resultado encontrado ao array
    }
    if (count($resultados) == 0) {
        echo json_encode(array("erro" => "Nenhum resultado encontrado"));
    }else{
    echo json_encode($resultados); // Retorna todos os resultados como JSON
}
