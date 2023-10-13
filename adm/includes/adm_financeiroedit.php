<?php
    session_start();
    require_once '../../conexao.php';
    var_dump($_POST);
    $id = $_POST['idValor'];
    $nome_edit = $_POST['nomeEdit'];
    $valor_edit = $_POST['valorEdit'];
    $mensal_edit = isset($_POST['mensal'])?true:false;
    $seleciona = "SELECT * FROM financeiro WHERE id_professor = '".$_SESSION['id']."'";
    $resultado_seleciona = mysqli_query($sql, $seleciona);
    if($resultado_seleciona){
        $edita = "UPDATE financeiro SET nome_financeiro = '".$nome_edit."' AND preco_financeiro = '".$valor_edit."' WHERE id_financeiro = '".$id."'";
        $edita2 = mysqli_query($sql, $valor_edit);
        if($edita2){
            if($mensal_edit == TRUE){
                $edita = "UPDATE financeiro SET mensal_financeiro '1' WHERE id_financeiro = '".$id."'";
                $edita2 = mysqli_query($sql, $edita);
                if($edita2){
                    $_SESSION['msg'] = "Dado editado com sucesso";
				    header("Location: ../adm_financeiro.php");
                }else{
                    $_SESSION['msg'] = "Erro ao editar dados";
				    header("Location: ../adm_financeiro.php");
                }
                $_SESSION['msg'] = "Dado editado com sucesso";
			    header("Location: ../adm_financeiro.php");
            }else{
                $mes_edit = $_POST['inputMes'];
                $edita = "UPDATE financeiro SET mes_financeiro '".$mes_edit."' AND mensal_financeiro '0' WHERE id_financeiro = '".$id."'";
                $edita2 = mysqli_query($sql, $edita);
                if($edita2){
                    $_SESSION['msg'] = "Dado editado com sucesso";
				    header("Location: ../adm_financeiro.php");
                }else{
                    $_SESSION['msg'] = "Erro ao editar dados";
				    header("Location: ../adm_financeiro.php");
                }
            }
        }else{
            $_SESSION['msg'] = "Erro ao editar dados";
			header("Location: ../adm_financeiro.php");
        }
    }

//TODO Excluir valor financeiro e fazer o edit funcionar