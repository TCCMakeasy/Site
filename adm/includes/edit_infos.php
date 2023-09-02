<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 3) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../professor/login.php");
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
    if ($dados['bio'] == "") {
        $dados['bio'] = $_SESSION['bio'];
    }
    if ($dados['email'] == "") {
        $dados['email'] = $_SESSION['email'];
    }
    if ($dados['valor'] == "") {
        $dados['valor'] = $_SESSION['valor'];
    }
    if ($dados['senha'] == "") {
        $update = "UPDATE professor SET email_professor = '" . $dados['email'] . "', foto_professor = '" . $dados['foto'] . "', bio_professor = '" . $dados['bio'] . "', valor_professor = '" . $dados['valor'] . "' WHERE id_professor = '" . $_SESSION['id'] . "'";
    } elseif ((strlen($dados['senha'])) < 6) {
        $erro = true;
        echo "A senha deve ter no minímo 6 caracteres";
    } elseif (stristr($dados['senha'], "&")) {
        $erro = true;
        echo "Carácter ( & ) utilizado na senha é inválido";
    } else {
        $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
        $update = "UPDATE professor SET email_professor = '" . $dados['email'] . "', senha_professor = '" . $dados['senha'] . "', foto_professor = '" . $dados['foto'] . "', bio_professor = '" . $dados['bio'] . "',  valor_professor = '" . $dados['valor'] . "' WHERE id_professor = '" . $_SESSION['id'] . "'";
    }
    if ($erro == false) {
        $result = mysqli_query($sql, $update);
        if ($result) {
            $_SESSION['msg'] = "Informações atualizadas com sucesso";
            $_SESSION['email'] = $dados['email'];
            $_SESSION['foto'] = $dados['fotoPerfil'];
            $_SESSION['bio'] = $dados['bio'];
            $_SESSION['valor'] = $dados['valor'];

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
