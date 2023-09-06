<?php
    require_once "../../conexao.php";

    $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $idAluno = $_POST['idAluno'];

    $aulaDia = $_POST['aulaDia'];

    $aulaHora = $_POST['aulaHora'];

    if ($aulaDia == "Segunda-Feira")
    {    
        $dia = 'seg';
    
    }else if($aulaDia == "Terça-Feira"){
        
        $dia = 'ter';

    }else if($aulaDia == "Quarta-Feira"){
    
        $dia = 'qua';
    
    }else if($aulaDia == "Quinta-Feira"){
    
        $dia = 'qui';
    
    }else if($aulaDia == "Sexta-Feira"){
    
        $dia = 'sex';
    
    }else if($aulaDia == "Sábado"){
    
        $dia = 'sab';
    
    }else if($aulaDia == "Domingo"){
    
        $dia = 'dom';
    
    }    

        $insertar = "INSERT INTO cronograma (".$dia."_cronograma, tempo_cronograma) values ('$idAluno', '$aulaHora')";   

        $select = mysqli_query($sql, $insertar);

?>