<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 1) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../aluno/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles/estiloPadrão.css">
    <link rel="stylesheet" type="text/css" href="./styles/estiloCronograma.css">
    <title>Document</title>

</head>

<body>
    <?php include_once "./includes/menuAluno.php"; ?>

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

                    <tr>

                        <th>10:00</th>
                        <td>Wellington</td>
                        <td>Wellington</td>
                        <td>Wellington</td>
                        <td>Wellington</td>
                        <td>Wellington</td>
                        <td>Wellington</td>
                        <td>Wellington</td>

                    </tr>

                    <tr>

                        <th>11:00</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>

                    <tr>

                        <th>12:00</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>

                    <tr>

                        <th>13:00</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>

                    <tr>

                        <th>14:00</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>

                    <tr>

                        <th>15:00</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>

                    <tr>

                        <th>16:00</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>

                    <tr>

                        <th>17:00</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>

                    <tr>

                        <th>18:00</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>

                    <tr>

                        <th>19:00</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>

                    <tr>

                        <th>20:00</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>

            </table>
            </div>
        </main>

    </section>

</body>
<script src="./js/menuOpenClose.js"></script>
<?php include_once "includes/modalNotificar.php"; ?>

</html>