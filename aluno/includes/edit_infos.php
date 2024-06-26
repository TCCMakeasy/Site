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
    $fotoPerfil = $_FILES['fotoPerfil'];
    if ($fotoPerfil['error'] == 4) {
        $dados['fotoPerfil'] = $_SESSION['foto'];
    } elseif ($fotoPerfil['size'] > 5242880) {
        $erro = true;
        $_SESSION['msg'] = "O arquivo enviado excede o limite de 5MB";
        header("Location: ../infos.php");
        exit();
    } else {
        $extensao = strtolower(pathinfo($fotoPerfil['name'], PATHINFO_EXTENSION));
        $novo_nome = md5(uniqid()) . "." . $extensao;
        $diretorio = "../../fotosPerfil/";
        if ($_SESSION['foto'] != "usuario.png") {
            unlink($diretorio . $_SESSION['foto']);
        }
        move_uploaded_file($fotoPerfil['tmp_name'], $diretorio . $novo_nome);
        $dados['fotoPerfil'] = $novo_nome;
    }
    if ($dados['nome'] == "") {
        $dados['nome'] = $_SESSION['nome'];
    }
    if (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
        if ($dados['email'] == "") {
            $dados['email'] = $_SESSION['email'];
        } else {
            $erro = true;
            $_SESSION['msg'] = "Digite um e-mail válido";
            header("Location: ../infos.php");
            exit();
        }
    }
    if ($dados['senha'] == "") {
        $update = "UPDATE aluno SET email_aluno = '" . $dados['email'] . "', nome_aluno = '" . $dados['nome'] . "', foto_aluno = '" .  $dados['fotoPerfil'] . "', telefone_aluno = '" . $dados['telefone'] . "', bio_aluno = '" . $dados['descInput'] . "' WHERE id_aluno = '" . $_SESSION['id'] . "'";
    } elseif ((strlen($dados['senha'])) < 6) {
        $erro = true;
        $_SESSION['msg'] = "A senha deve conter no mínimo 6 caracteres";
        header("Location: ../infos.php");
        exit();
    } elseif (stristr($dados['senha'], "&")) {
        $erro = true;
        $_SESSION['msg'] = "Carácter ( & ) utilizado na senha é inválido";
        header("Location: ../infos.php");
        exit();
    } else {
        $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
        $update = "UPDATE aluno SET email_aluno = '" . $dados['email'] . "', nome_aluno = '" . $dados['nome'] . "', senha_aluno = '" . $dados['senha'] . "', foto_aluno = '" .  $dados['fotoPerfil'] . "', bio_aluno = '" . $dados['descInput'] . "', telefone_aluno = '" . $dados['telefone'] . "' WHERE id_aluno = '" . $_SESSION['id'] . "'";
    }
    if ($erro == false) {
        $result = mysqli_query($sql, $update);
        if ($result) {
            $_SESSION['msg'] = "Informações atualizadas com sucesso";
            $_SESSION['email'] = $dados['email'];
            $_SESSION['nome'] = $dados['nome'];
            $_SESSION['foto'] = $dados['fotoPerfil'];
            $_SESSION['desc'] = $dados['descInput'];
            $_SESSION['telefone'] = $dados['telefone'];
            header("Location: ../infos.php");
            exit();
        } else {
            $_SESSION['msg'] = "Erro ao atualizar informações";
            header("Location: ../infos.php");
            exit();
        }
    } else {
        $_SESSION['msg'] = "Erro ao atualizar informações";
        header("Location: ../infos.php");
        exit();
    }
}
