<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 1) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../aluno/login.php");
} else {
    require_once "../../conexao.php";
    $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $dados_st = array_map('strip_tags', $dados_rc);
    $dados = array_map('trim', $dados_st);
    $erro = false;
    echo $dados['email'];
    if ($dados['fotoPerfil'] == "") {
        $dados['fotoPerfil'] = $_SESSION['foto'];
    }
    if ($dados['descInput'] == "") {
        $dados['descInput'] = $_SESSION['desc'];
    }
    if ($dados['email'] == "") {
        $dados['email'] = $_SESSION['email'];
    }
    if ($dados['senha'] == "") {
        $update = "UPDATE aluno SET email_aluno = '" . $dados['email'] . "', foto_aluno = '" . $dados['fotoPerfil'] . "', desc_aluno = '" . $dados['descInput'] . "' WHERE id_aluno = '" . $_SESSION['id'] . "'";
    } elseif ((strlen($dados['senha'])) < 6) {
        $erro = true;
        echo "A senha deve ter no minímo 6 caracteres";
    } elseif (stristr($dados['senha'], "&")) {
        $erro = true;
        echo "Carácter ( & ) utilizado na senha é inválido";
    } else {
        $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
        $update = "UPDATE aluno SET email_aluno = '" . $dados['email'] . "', senha_aluno = '" . $dados['senha'] . "', foto_aluno = '" . $dados['fotoPerfil'] . "', desc_aluno = '" . $dados['descInput'] . "' WHERE id_aluno = '" . $_SESSION['id'] . "'";
    }
    if ($erro == false) {
        $result = mysqli_query($sql, $update);
        if ($result) {
            $_SESSION['msg'] = "Informações atualizadas com sucesso";
            $_SESSION['email'] = $dados['email'];
            $_SESSION['foto'] = $dados['fotoPerfil'];
            $_SESSION['desc'] = $dados['descInput'];
            header("Location: ../infos.php");
        } else {
            $_SESSION['msg'] = "Erro ao atualizar informações";
            header("Location: ../infos.php");
        }
    } else {
        $_SESSION['msg'] = "Erro ao atualizar informações";
        header("Location: ../infos.php");
    }
}