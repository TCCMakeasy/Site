<?php

session_start();

if (!isset($_SESSION['id'])) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../aluno/login.php");
}else{
    require_once "../../conexao.php";
    $id = $_SESSION['id'];
    $hndl = fopen("php://input", "r");
    $id_notifica = fread($hndl, 1024);
    if($id_notifica == "all"){
        $apagar = "DELETE FROM notifica WHERE id_aluno = '".$_SESSION['id']."'";
    }else{
        $apagar = "DELETE FROM notifica WHERE id_aluno = '".$_SESSION['id']."' AND id_notifica = '$id_notifica'";
    }
    $result_apagar = mysqli_query($sql, $apagar);
    if($result_apagar){
        echo 200;
    }
    else{
        echo 404;
    }

    $delete = "DELETE FROM aluno WHERE id_aluno = '$id'";
    $result = mysqli_query($sql, $delete)  or die (mysqli_error($sql));

    if($result){
        //Conta excluída com sucesso

        $verifica = "SELECT * from aluno where id_aluno = ".$_SESSION['id']." AND id_professor is not NULL";
        $verificaFinal = mysqli_query($sql, $verifica);

        if(mysqli_num_rows($verificaFinal) > 0){

        $data = date('m');
        
        $select = "SELECT * from armazena where mensal_armazena = $data";
        $selectComando = mysqli_query($sql, $select);

        $select1 = "SELECT * from armazena where id_professor = ".$_SESSION['id_professor']."";
        $selectComando1 = mysqli_query($sql, $select1);	
        
        if(mysqli_num_rows($selectComando1) > 0 && (mysqli_num_rows($selectComando) > 0)){

            $altera = "update armazena set perdidos_armazena = (perdidos_armazena + 1) where id_professor = ".$_SESSION['id_professor']." AND mensal_armazena = $data";
            $alteraFinal = mysqli_query($sql, $altera);

        }else{

        $armazena = "INSERT into armazena(id_professor, perdidos_armazena, mensal_armazena) values ( ".$_SESSION['id_professor']." ,perdidos_armazena + 1, $data)";
        $armazenaFinal = mysqli_query($sql, $armazena);

        }
    }

        session_destroy();
        header("Location: ../login.php");
    }else{
        $_SESSION['msg'] = "Erro ao excluir conta";
        header("Location: ../infos.php");
    }
}

?>
