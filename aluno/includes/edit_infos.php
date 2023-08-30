<?php
$btnEdit = filter_input(INPUT_POST, "btnSalvar", FILTER_DEFAULT);

if($btnEdit){
    $email_edit = $_POST['email'];
    $senha_edit = $_POST['senha'];
    $foto_edit = $_POST['fotoPerfil'];
    $desc_edit =  $_POST['descInput'];
    if($email_edit && $senha_edit && $foto_edit && $desc_edit){

    }
}

?>