<?php
require_once("../../conexao.php");
$hndl = fopen("php://input", "r");
$ValorPesquisa = fread($hndl, 1024);
$ValorPesquisa = explode(",",$ValorPesquisa);
$IdPesquisa = $ValorPesquisa[0];
$tipoPesquisa = $ValorPesquisa[1];

if($tipoPesquisa = "professor"){
    $search = 'SELECT nome_professor FROM professor WHERE id_professor = "'.$IdPesquisa.'"';
}elseif($tipoPesquisa = "aluno"){
    $search = 'SELECT nome_aluno FROM aluno WHERE id_aluno = "'.$IdPesquisa.'"';
}
$resultSearch = mysqli_query($sql,$search);
$nome = mysqli_fetch_assoc($resultSearch);
$nome = $nome['nome_'.$tipoPesquisa];
echo $nome;