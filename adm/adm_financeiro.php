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
        <h1>Adicionar ganho</h1>
        <form id="formAddGanho">
        <div id="nomeGanho">
                <label for="inputnomeGanho"><b>Nome:</b></label>
                <input type="text" name="nomeGasto" id="inputnomeGanho">
            </div>
            <div id="valorGanho">
                <label for="inputvalorGanho"><b>Nome:</b></label>
                <input type="text" name="valorGanho" id="inputvalorGanho">
            </div>
            <div id="confirmar">
                <input type="submit" id="adicionarAluno" name="btnAddAluno" value="Adicionar Aluno">
                <button id="closeAddAluno" type="button">Cancelar</button>
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