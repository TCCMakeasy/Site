<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 1) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../aluno/login.php");
} else if (isset($_SESSION['id_professor'])) {
    require_once("../conexao.php");
    $horarios = array("10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20");
    $days = array("seg", "ter", "qua", "qui", "sex", "sab", "dom");
} else {
    $_SESSION['msg'] = "Você não tem um professor";
    header("Location: ../aluno/infos.php");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles/estiloCronograma.css">
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />
    <title>Horário</title>

</head>

<body <?php if(isset($_SESSION['msg'])) { echo 'onload="alerta()"';} ?>>
    <?php

    include_once "./includes/menuAluno.php";

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
                        $sqlSelect = "SELECT * FROM cronograma WHERE tempo_cronograma = '" . $horario . ":00:00' AND id_professor = '" . $_SESSION['id_professor'] . "'";
                        $sqlHorarios = mysqli_fetch_assoc(mysqli_query($sql, $sqlSelect));
                        foreach ($days as $day) {
                            if (isset($sqlHorarios[$day . '_cronograma'])) {
                                echo '<td id="' . $day . ':' . $horario . '">';
                                if ($sqlHorarios[$day . '_cronograma'] == "privado") {
                                    echo "Ocupado";
                                } else {
                                    $alunoSelect = "SELECT nome_aluno FROM aluno WHERE id_aluno = '" . $sqlHorarios[$day . '_cronograma'] . "' AND id_professor = '" . $_SESSION['id_professor'] . "'";
                                    $alunoRequest = mysqli_query($sql, $alunoSelect);
                                    $aluno = mysqli_fetch_assoc($alunoRequest);
                                    if ($aluno['nome_aluno'] == $_SESSION['nome']) {
                                        echo "Você";
                                    } else {
                                        echo "Ocupado";
                                    }
                                }
                            } else {
                                echo '<td id="' . $day . ':' . $horario . '" class="disponivel">';
                                echo "Disponível";
                            }
                            echo '</td>';
                        }
                        echo '</tr>';
                    }
                    ?>
                </table>
            </div>

            <div id="botoes">
                <button id="abrirMarcarAula" class="btnHorario">Marcar aula</button>
                <button id="desmarcarAula" class="btnHorario">Desmarcar aula</button>

            </div>
        </main>

    </section>

</body>
<dialog id="marAula">
    <div id="marAula-content">
        <form action="./includes/marcar-aula.php" method="post" id="formMarcarAula">
            <h1>Marcar aula</h1>
            <div id="aulaDia">
                <label for="inputDia"><b>Dia da semana:</b></label>
                <select name="aulaDia" id="inputDia">
                    <option value="seg">Segunda-Feira</option>
                    <option value="ter">Terça-Feira</option>
                    <option value="qua">Quarta-Feira</option>
                    <option value="qui">Quinta-Feira</option>
                    <option value="sex">Sexta-Feira</option>
                    <option value="sab">Sábado</option>
                    <option value="dom">Domingo</option>

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
<script> 
    const alerta = () => alert("<?php echo $_SESSION['msg'];?>");
</script>
<script src="./js/menuOpenClose.js"></script>
<script src="./js/selectAula.js"></script>
<?php
include_once "includes/modalNotificar.php";
unset($_SESSION['msg']); ?>

</html>