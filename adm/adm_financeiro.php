<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 3) {
    $_SESSION['msg'] = "Faça login para acessar o sistema";
    header("Location: ../professor/login.php");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financeiro</title>
    <link rel="stylesheet" type="text/css" href="./styles/estiloFinancas.css">
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <?php include_once "includes/menuAdm.php"; ?>
    <section id="tela">
        <main>
            <h1 id="title">Financeiro</h1>
            <div id="container">
                <h1 id="title">Lucro Mensal</h1>
                <div class="grafico" id="graficos"><canvas id="lucroMensal"></canvas></div>

                <script>

                </script>
                <div id="botoes">
                    <button id="abrirAddGanho">Adicionar ganho</button>
                    <button id="abrirAddGasto">Adicionar gasto</button>
                    <button id="abrirEdxValor">Editar/Excluir valor</button>
                </div><br>
                <h1 id="title">Avaliações</h1>
                <div class="grafico" id="graficos"><canvas id="avaliacoes"></canvas></div>

                <script>

                </script><br>
                <h1 id="title">Alunos</h1>
                <div class="grafico" id="graficos">
                    <canvas id="alunosMensal"></canvas>
                </div>
                <script>

                </script>
            </div>
        </main>
    </section>
</body>

<dialog id="AddGanho">
    <div id="AddGanho-content">
        <form id="formAddGanho" action="./includes/add_ganhos.php" method="post">
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
                <input type="checkbox" name="mensal" id="inputMensal" onclick="disableInput()">
            </div>
            <div id="mesGanho">
                <label for="inputMes"><b>Mês:</b></label>
                <select name="mesGanho" id="inputMes">
                    <option value="jan">Janeiro</option>
                    <option value="fev">Fevereiro</option>
                    <option value="mar">Março</option>
                    <option value="abr">Abril</option>
                    <option value="mai">Maio</option>
                    <option value="junho">Junho</option>
                </select>
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
        <form id="formAddGasto" action="./includes/add_gastos.php" method="post">
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
            <div id="mesGasto">
                <label for="inputMes"><b>Mês:</b></label>
                <select name="mesGasto" id="inputMes">
                    <option value="jan">Janeiro</option>
                    <option value="fev">Fevereiro</option>
                    <option value="mar">Março</option>
                    <option value="abr">Abril</option>
                    <option value="mai">Maio</option>
                    <option value="junho">Junho</option>
                </select>
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

        <table id="tabela" action="./includes/adm_financeiroedit.php">
            <tr>
                <th id="valorTitle">Nome</th>
                <th id="valorTitle">Valor</th>
                <th id="valorTitle">Tipo</th>
            </tr>
            <?php
            require_once '../conexao.php';
            $seleciona_financeiro = "SELECT * FROM financeiro WHERE id_professor = '" . $_SESSION['id'] . "'";
            $resultado_financeiro = mysqli_query($sql, $seleciona_financeiro);
            while ($row_edit = mysqli_fetch_assoc($resultado_financeiro)) {
                echo '<tr id="linha">';
                echo '<td class="valores" id="nome_financa">' . $row_edit['nome_financeiro'] . '</td>';
                echo '<td class="valores" id="valor_financa">' . $row_edit['preco_financeiro'] . '</td>';
                if ($row_edit['tipo_financeiro'] == 1) {
                    echo '<td class="valores">Ganho</td>';
                } else {
                    echo '<td class="valores">Gasto</td>';
                }
                echo '</tr>';
            }

            ?>

        </table>
        <form id="formEdxValor">
            <div id="nomeValor">
                <label for="inputnomeValor"><b>Nome:</b></label>
                <input type="text" name="nomeValor" id="inputnomeValor" value="">
            </div>
            <div id="valorValor">
                <label for="inputvalorValor"><b>Valor:</b></label>
                <input type="text" name="valorValor" id="inputvalorValor">
            </div>
            <div id="mensal">
                <label for="inputMensal"><b>Mensal:</b></label>
                <input type="checkbox" name="mensal" id="inputMensal">
            </div>
            <div id="mesValor">
                <label for="inputValor"><b>Mês:</b></label>
                <select name="mesValor" id="inputValor">
                    <option value="jan">Janeiro</option>
                    <option value="fev">Fevereiro</option>
                    <option value="mar">Março</option>
                    <option value="abr">Abril</option>
                    <option value="mai">Maio</option>
                    <option value="junho">Junho</option>
                </select>
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

<script src="./js/selectValor.js"></script>
<script src="./js/graficos.js"></script>
<?php echo "<script>pesquisa(" . $_SESSION['id'] . ")</script>"; ?>
<script src="./js/addGanhoOpenClose.js"></script>
<script src="./js/addGastoOpenClose.js"></script>
<script src="./js/edxValorOpenClose.js"></script>
<script src="./js/menuOpenClose.js"></script>
<?php include_once "includes/modalNotificar.php"; ?>

</html>