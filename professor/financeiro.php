<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 2) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../professor/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financeiro</title>
    <link rel="stylesheet" type="text/css" href="./styles/estiloPadrão.css">
    <link rel="stylesheet" type="text/css" href="./styles/estiloFinancas.css">
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <?php include_once "includes/menuProfessor.php"; ?>
    <main>
        <h1 id="title">Financeiro</h1>
        <div id="container">
            <h1 id="title">Lucro Mensal</h1>
            <div class="grafico"><canvas id="lucroMensal"></canvas></div>

            <script>
                const meses = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', ];
                const lucroMensal = document.getElementById('lucroMensal').getContext('2d');

                const graficoLucroMensal = new Chart(lucroMensal, {
                    type: 'line',
                    data: {
                        labels: meses,
                        datasets: [{
                                label: 'Ganhos',
                                data: [1500, 1400, 1600, 1700, 1750, 1800],
                                tension: 0.3,
                                borderColor: '#ef1dac',
                                backgroundColor: '#ef1dac'
                            },
                            {
                                label: 'Gastos',
                                data: [1000, 1100, 1200, 1300, 1400, 1500],
                                tension: 0.3,
                                borderColor: '#e02b20',
                                backgroundColor: '#e02b20'
                            },
                            {
                                label: 'Lucro',
                                data: [500, 300, 400, 400, 350, 300],
                                tension: 0.3,
                                borderColor: '#7cda24',
                                backgroundColor: '#7cda24'
                            }
                        ]
                    },
                    options: {
                        elements: {
                            point: {
                                radius: 0
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: false,
                                grid: {
                                    color: '#fff',
                                },
                                ticks: {
                                    color: '#fff',
                                    callback: function(value, index, values) {
                                        return 'R$ ' + value;
                                    },
                                    padding: 15,
                                    font: {
                                        size: 16,
                                        family: 'Open Sans',
                                    }
                                },
                                border: {
                                    width: 0
                                }
                            },
                            x: {
                                grid: {
                                    color: 'rgba(255, 255, 255, 0)',
                                },
                                ticks: {
                                    color: '#fff',
                                    padding: 15,
                                    font: {
                                        size: 16,
                                        family: 'Open Sans',
                                    }
                                },
                            }
                        },
                        plugins: {
                            legend: {
                                labels: {
                                    font: {
                                        size: 20,
                                        family: 'Open Sans',
                                    },
                                    color: "#fff"
                                },

                            }
                        }
                    }
                });
            </script>
            <div id="botoes">
                <button id="abrirAddGanho">Adicionar ganho</button>
                <button id="abrirAddGasto">Adicionar gasto</button>
                <button id="abrirEdxValor">Editar/Excluir valor</button>
            </div>
        </div>
    </main>
</body>

<dialog id="AddGanho">
    <div id="AddGanho-content">
        <form id="formAddGanho">
            <h1>Adicionar ganho</h1>
            <div id="nomeGanho">
                <label for="inputnomeGanho"><b>Nome:</b></label>
                <input type="text" name="nomeGanho" id="inputnomeGanho">
            </div>
            <div id="valorGanho">
                <label for="inputvalorGanho"><b>Valor:</b></label>
                <input type="text" name="valorGanho" id="inputvalorGanho">
            </div>
            <div id="mensal">
                <label for="inputMensal"><b>Mensal:</b></label>
                <input type="checkbox" name="mensal" id="inputMensal">
            </div>
            <div id="submitAddGanho">
                <input type="submit" id="btnAddGanho" name="btnAddGanho" value="Adicionar Ganho">
                <button id="closeAddGanho" type="button">Cancelar</button>
            </div>
        </form>
    </div>
</dialog>

<dialog id="AddGasto">
    <div id="AddGasto-content">
        <form id="formAddGasto">
            <h1>Adicionar gasto</h1>
            <div id="nomeGasto">
                <label for="inputnomeGasto"><b>Nome:</b></label>
                <input type="text" name="nomeGasto" id="inputnomeGasto">
            </div>
            <div id="valorGasto">
                <label for="inputvalorGasto"><b>Valor:</b></label>
                <input type="text" name="valorGasto" id="inputvalorGasto">
            </div>
            <div id="mensal">
                <label for="inputMensal"><b>Mensal:</b></label>
                <input type="checkbox" name="mensal" id="inputMensal">
            </div>
            <div id="submitAddGasto">
                <input type="submit" id="btnAddGasto" name="btnAddGasto" value="Adicionar Gasto">
                <button id="closeAddGasto" type="button">Cancelar</button>
            </div>
        </form>
    </div>
</dialog>

<dialog id="EdxValor">
    <div id="EdxValor-content">
        <form id="formEdxValor">
            <table id="tabela">
            <tr>
                    <th id="valorTitle">Nome</th>
                    <th id="valorTitle">Valor</th>
                    <th id="valorTitle">Tipo</th>
                </tr>
                <tr>
                    <th id="valores">Netflix</th>
                    <th id="valores">40</th>
                    <th id="valores">Gasto</th>
                </tr>
                <tr>
                    <th id="valores">Netflix</th>
                    <th id="valores">40</th>
                    <th id="valores">Gasto</th>
                </tr>
                <tr>
                    <th id="valores">Netflix</th>
                    <th id="valores">40</th>
                    <th id="valores">Gasto</th>
                </tr>
                <tr>
                    <th id="valores">Netflix</th>
                    <th id="valores">40</th>
                    <th id="valores">Gasto</th>
                </tr>
                <tr>
                    <th id="valores">Netflix</th>
                    <th id="valores">40</th>
                    <th id="valores">Gasto</th>
                </tr>
            </table>
            <div id="nomeValor">
                <label for="inputnomeValor"><b>Nome:</b></label>
                <input type="text" name="nomeValor" id="inputnomeValor">
            </div>
            <div id="valorValor">
                <label for="inputvalorValor"><b>Valor:</b></label>
                <input type="text" name="valorValor" id="inputvalorValor">
            </div>
            <div id="mensal">
                <label for="inputMensal"><b>Mensal:</b></label>
                <input type="checkbox" name="mensal" id="inputMensal">
            </div>
            <div id="submitEdxValor">
                <input type="submit" id="btnEdValor" name="btnEdValor" value="Editar valor">
                <input type="submit" id="btnExValor" name="btnExValor" value="Excluir valor">
                <button id="closeEdxValor" type="button">Cancelar</button>
            </div>
        </form>
    </div>
</dialog>

<dialog id="EdxValor">
    <div id="EdxValor-content">
        <form id="formEdxValor">
            <div id="nomeGasto">
                <label for="inputnomeGasto"><b>Nome do gasto:</b></label>
                <input type="text" name="nomeGasto" id="inputnomeGasto">
            </div>
            <div id="valorGasto">
                <label for="inputvalorGasto"><b>Valor do gasto:</b></label>
                <input type="text" name="valorGasto" id="inputvalorGasto">
            </div>
            <div id="mensal">
                <label for="inputMensal"><b>Mensal:</b></label>
                <input type="checkbox" name="mensal" id="inputMensal">
            </div>
            <div id="submitAddGasto">
                <input type="submit" id="btnAddGasto" name="btnAddGasto" value="Adicionar Gasto">
                <button id="closeAddGasto" type="button">Cancelar</button>
            </div>
        </form>
    </div>
</dialog>

<script src="./js/addGanhoOpenClose.js"></script>
<script src="./js/addGastoOpenClose.js"></script>
<script src="./js/edxValorOpenClose.js"></script>
<?php include_once "includes/modalNotificar.php"; ?>

</html>