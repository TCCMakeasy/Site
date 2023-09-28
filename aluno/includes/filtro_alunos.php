
<?php

require_once '../../conexao.php';
$hndl = fopen("php://input", "r");
$tipoDoFiltro = fread($hndl, 1024);

if ($valor == "Crescente" && $avalia == "Crescente")
{
    $procura = "SELECT * from professor ORDER BY valor_professor ASC, nota_professor ASC";
    $mysql = mysqli_query($sql, $procura);
    $resultados = array(); // Inicializa um array para armazenar os resultados

    while ($row_pesquisa = mysqli_fetch_assoc($mysql)) {
        $resultados[] = $row_pesquisa;
    }
    if (count($resultados) == 0) {
        echo json_encode(array("erro" => "Nenhum resultado encontrado"));
    }else{
    echo json_encode($resultados);

}}
else if ($valor == "Crescente" && $avalia == "Decrescente")
  {

      $procura = "SELECT * from professor ORDER BY valor_professor ASC, nota_professor DESC";
      $mysql = mysqli_query($sql, $procura);
      $resultados = array(); // Inicializa um array para armazenar os resultados
  
      while ($row_pesquisa = mysqli_fetch_assoc($mysql)) {
          $resultados[] = $row_pesquisa;
      }
      if (count($resultados) == 0) {
          echo json_encode(array("erro" => "Nenhum resultado encontrado"));
      }else{
      echo json_encode($resultados);
      }
  }
  else if ($valor == "Decrescente" && $avalia == "Crescente")
    {

        $mysql = "SELECT * from professor ORDER BY valor_professor DESC, nota_professor ASC";
        $mysql = mysqli_query($sql, $procura);
        $resultados = array(); // Inicializa um array para armazenar os resultados
    
        while ($row_pesquisa = mysqli_fetch_assoc($mysql)) {
            $resultados[] = $row_pesquisa;
        }
        if (count($resultados) == 0) {
            echo json_encode(array("erro" => "Nenhum resultado encontrado"));
        }else{
        echo json_encode($resultados);
        }

    }
    else if ($valor == "Decrescente" && $avalia == "Decrescente")
      {

          $mysql = "SELECT * from professor ORDER BY valor_professor DESC, nota_professor DESC";
          $mysql = mysqli_query($sql, $procura);
          $resultados = array(); // Inicializa um array para armazenar os resultados
      
          while ($row_pesquisa = mysqli_fetch_assoc($mysql)) {
              $resultados[] = $row_pesquisa;
          }
          if (count($resultados) == 0) {
              echo json_encode(array("erro" => "Nenhum resultado encontrado"));
          }else{
          echo json_encode($resultados);
          }

      }

?>