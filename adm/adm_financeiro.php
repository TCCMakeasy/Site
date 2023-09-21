<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 3) {
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
</head>

<body>
    <?php include_once "includes/menuAdm.php"; ?>
    <main>
        <h1 id="title">Financeiro</h1>
        <div id="container">
            <h1 id="title">Lucro Mensal</h1>
            <div id="botoes">
                <button id="abrirAddGanho">Adicionar ganho</button>
                <button id="abrirAddGasto">Adicionar gasto</button>
                <button id="abrirValores">Editar/Excluir valor</button>
            </div>

            <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
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
                <input type="checkbox" name="mensal" id="checkMensal">
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
                <label for="inputnomeGasto"><b>Nome do gasto:</b></label>
                <input type="text" name="nomeGasto" id="inputnomeGasto">
            </div>
            <div id="valorGasto">
                <label for="inputvalorGasto"><b>Valor do gasto:</b></label>
                <input type="text" name="valorGasto" id="inputvalorGasto">
            </div>
            <div id="mensal">
                <label for="inputMensal"><b>Mensal:</b></label>
                <input type="checkbox" name="mensal" id="checkMensal">
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
        <h1>Adicionar gasto</h1>
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
                <input type="checkbox" name="mensal" id="checkMensal">
            </div>
            <div id="submitAddGasto">
                <input type="submit" id="btnAddGasto" name="btnAddGasto" value="Adicionar Gasto">
                <button id="closeAddGasto" type="button">Cancelar</button>
            </div>
        </form>
    </div>
</dialog>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

<script>
    const myChart = new Chart("myChart", {
        type: "bar",
        data: {},
        options: {}
    });
</script>
<script src="./js/addGanhoOpenClose.js"></script>
<script src="./js/addGastoOpenClose.js"></script>
<script src="./js/edxValorOpenClose.js"></script>
<?php include_once "includes/modalNotificar.php"; ?>

</html>