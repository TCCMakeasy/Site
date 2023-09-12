<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 2) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../professor/login.php");
}else{
    require_once("../conexao.php");
    $horarios = array("10", "11", "12", "13", "14","15", "16", "17", "18", "19","20");
    $days = array("seg", "ter", "qua", "qui", "sex", "sab", "dom");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles/estiloPadrão.css">
    <link rel="stylesheet" type="text/css" href="./styles/estiloCronograma.css">
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />
    <title>Horário</title>

</head>

<body>
    <?php

    include_once "./includes/menuProfessor.php";

    ?>

    <section id="tela">

        <main>

            <h1 id="title">Horário</h1>
            <div id="container">
                <table id="tabela">

                    <tr>
                        <th id="horarioTitle">HORÁRIOS</th>
                        <th id="diasTitle">DIAS</th>
                        <th class="diasTable">SEGUNDA</th>
                        <th class="diasTable">TERÇA</th>
                        <th class="diasTable">QUARTA</th>
                        <th class="diasTable">QUINTA</th>
                        <th class="diasTable">SEXTA</th>
                        <th class="diasTable">SÁBADO</th>
                        <th class="diasTable">DOMINGO</th>
                    </tr>
                    <?php
                    foreach ($horarios as $horario) {
                        echo '<tr>';
                        echo '<th>' . $horario . ':00</th>';
                        $sqlSelect = "SELECT * FROM cronograma WHERE tempo_cronograma = '".$horario.":00:00' AND id_professor = '" . $_SESSION['id'] . "'";
                        $sqlHorarios = mysqli_fetch_assoc(mysqli_query($sql, $sqlSelect));
                        foreach ($days as $day) {
                            echo '<td>' ;
                            if (isset($sqlHorarios[$day . '_cronograma'])) { echo $sqlHorarios[$day . '_cronograma'];}else{echo "";} 
                            echo '</td>';
                        }
                        echo '</tr>';
                    }
                    ?>
                </table>
            </div>

            <div id="botoes">

                <button id="abrirMarcarAula">Marcar aula</button>
                <button id="abrirDesmarcarAula">Desmarcar aula</button>

            </div>
        </main>

    </section>

</body>
<dialog id="marAula">
    <div id="marAula-content">
        <form action="./includes/prof_marcar-aula.php" method="post" id="formMarcarAula">
            <h1>Marcar aula</h1>
            <div id="idAluno">
                <label for="inputIdAluno"><b>ID do aluno:</b></label>
                <input type="text" name="idAluno" id="inputIdAluno" placeholder="ID do Aluno" required>
            </div>
            <div id="aulaDia">
                <label for="inputDia"><b>Dia da semana:</b></label>
                <select name="aulaDia" id="inputDia">
                    <option value="Segunda-Feira">Segunda-Feira</option>
                    <option value="Terça-Feira">Terça-Feira</option>
                    <option value="Quarta-Feira">Quarta-Feira</option>
                    <option value="Quinta-Feira">Quinta-Feira</option>
                    <option value="Sexta-Feira">Sexta-Feira</option>
                    <option value="Sábado">Sábado</option>
                    <option value="Domingo">Domingo</option>

                </select>
            </div>
            <div id="aulaHora">
                <label for="inputHora"><b>Horário:</b></label>
                <input type="time" name="aulaHora" id="inputHora" min="10:00" max="20:00" step="3600" required>
            </div>
            <div id="submitMarcarAula">
                <input type="submit" id="btnMarcarAula" name="btnMarcarAula" value="Marcar Aula">
                <button id="closeMarcarAula">Cancelar</button>
            </div>
        </form>
    </div>
</dialog>
<script src="./js/marcarAulaOpenClose.js"></script>
<script src="./js/menuOpenClose.js"></script>
<script src="./js/selectAula.js"></script>
<?php include_once "includes/modalNotificar.php"; ?>

</html>