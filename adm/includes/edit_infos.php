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
    $fotoPerfil = $_FILES['fotoPerfil'];
    if ($fotoPerfil['error'] == 4) {
        $fotoPerfil = $_SESSION['foto'];
    }elseif($fotoPerfil['size'] > 5242880){
        $erro = true;
        echo "O arquivo enviado excede o limite de 5MB";
    }else{
        $extensao = strtolower(pathinfo($fotoPerfil['name'], PATHINFO_EXTENSION));
        $novo_nome = md5(uniqid()) . "." . $extensao;
        $diretorio = "../fotosPerfil/";
        if ($_SESSION['foto'] != "usuario.png"){unlink($diretorio . $_SESSION['foto']);}
        move_uploaded_file($fotoPerfil['tmp_name'], $diretorio . $novo_nome);
        $dados['fotoPerfil'] = $novo_nome;
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
        $update = "UPDATE professor SET email_professor = '" . $dados['email'] . "', foto_professor = '" . $dados['fotoPerfil'] . "', bio_professor = '" . $dados['bio'] . "', valor_professor = '" . $dados['valor'] . "' WHERE id_professor = '" . $_SESSION['id'] . "'";
    } elseif ((strlen($dados['senha'])) < 6) {
        $erro = true;
        echo "A senha deve ter no minímo 6 caracteres";
    } elseif (stristr($dados['senha'], "&")) {
        $erro = true;
        echo "Carácter ( & ) utilizado na senha é inválido";
    } else {
        $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
        $update = "UPDATE professor SET email_professor = '" . $dados['email'] . "', senha_professor = '" . $dados['fotoPerfil'] . "', foto_professor = '" . $dados['foto'] . "', bio_professor = '" . $dados['bio'] . "',  valor_professor = '" . $dados['valor'] . "' WHERE id_professor = '" . $_SESSION['id'] . "'";
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
