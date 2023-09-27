
<?php

require_once '../../conexao.php';

header("Location: ../professores.php");

$valor = $_POST['valor'];

$avalia = $_POST['avalia'];

if ($valor == "Crescente" && $avalia == "Crescente")
{

    $mysql = "SELECT * from professor ORDER BY valor_professor ASC, nota_professor ASC";
    $sql = mysqli_query($sql, $mysql);

    echo "Foiiii";

}
else if ($valor == "Crescente" && $avalia == "Decrescente")
  {

      $mysql = "SELECT * from professor ORDER BY valor_professor ASC, nota_professor DESC";
      $sql = mysqli_query($sql, $mysql);

      echo "TOP";

  }
  else if ($valor == "Decrescente" && $avalia == "Crescente")
    {

        $mysql = "SELECT * from professor ORDER BY valor_professor DESC, nota_professor ASC";
        $sql = mysqli_query($sql, $mysql);

        echo "Caio";

    }
    else if ($valor == "Decrescente" && $avalia == "Decrescente")
      {

          $mysql = "SELECT * from professor ORDER BY valor_professor DESC, nota_professor DESC";
          $sql = mysqli_query($sql, $mysql);

          echo "<h1 align='center'>Fareree</h1>";

      }

?>