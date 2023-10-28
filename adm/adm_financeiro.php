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
                <?php if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                } ?>
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
                <input type="text" name="valorGanho" id="inputvalorGanho" onKeyUp="mascaraMoeda(this, event)">
            </div>
            <div id="mensal">
                <label for="inputMensal"><b>Mensal:</b></label>
                <input type="checkbox" name="mensal" class="inputMensal" onclick="disableInput(0)">
            </div>
            <div id="mesGanho">
                <label for="inputMes0"><b>Mês:</b></label>
                <select name="mesGanho" id="inputMes0" class="inputMes">
                    <option value="jan">Janeiro</option>
                    <option value="fev">Fevereiro</option>
                    <option value="mar">Março</option>
                    <option value="abr">Abril</option>
                    <option value="mai">Maio</option>
                    <option value="jun">Junho</option>
                    <option value="jul">Julho</option>
                    <option value="ago">Agosto</option>
                    <option value="set">Setembro</option>
                    <option value="out">Outubro</option>
                    <option value="nov">Novembro</option>
                    <option value="dez">Dezembro</option>
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
                <input type="text" name="valorGasto" id="inputvalorGasto" onKeyUp="mascaraMoeda(this, event)">
            </div>
            <div id="mensal">
                <label for="inputMensal"><b>Mensal:</b></label>
                <input type="checkbox" name="mensal" class="inputMensal" onclick="disableInput(1)">
            </div>
            <div id="mesGasto">
                <label for="inputMes1"><b>Mês:</b></label>
                <select name="mesGasto" id="inputMes1" class="inputMes">
                    <option value="jan">Janeiro</option>
                    <option value="fev">Fevereiro</option>
                    <option value="mar">Março</option>
                    <option value="abr">Abril</option>
                    <option value="mai">Maio</option>
                    <option value="jun">Junho</option>
                    <option value="jul">Julho</option>
                    <option value="ago">Agosto</option>
                    <option value="set">Setembro</option>
                    <option value="out">Outubro</option>
                    <option value="nov">Novembro</option>
                    <option value="dez">Dezembro</option>
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

        <table id="tabela">
            <tr>
                <th class="valorTitle">Id</th>
                <th class="valorTitle">Nome</th>
                <th class="valorTitle">Valor</th>
                <th class="valorTitle">Mês</th>
                <th class="valorTitle">Tipo</th>
            </tr>
            <?php
            require_once '../conexao.php';
            $seleciona_financeiro = "SELECT * FROM financeiro WHERE id_professor = '" . $_SESSION['id'] . "'";
            $resultado_financeiro = mysqli_query($sql, $seleciona_financeiro);
            while ($row_edit = mysqli_fetch_assoc($resultado_financeiro)) {
                switch ($row_edit['mes_financeiro']) {
                    case "jan":
                        $row_edit['mes_financeiro'] = "Janeiro";
                        break;
                    case "fev":
                        $row_edit['mes_financeiro'] = "Fevereiro";
                        break;
                    case "mar":
                        $row_edit['mes_financeiro'] = "Março";
                        break;
                    case "abr":
                        $row_edit['mes_financeiro'] = "Abril";
                        break;
                    case "mai":
                        $row_edit['mes_financeiro'] = "Maio";
                        break;
                    case "jun":
                        $row_edit['mes_financeiro'] = "Junho";
                        break;
                    case "jul":
                        $row_edit['mes_financeiro'] = "Julho";
                        break;
                    case "ago":
                        $row_edit['mes_financeiro'] = "Agosto";
                        break;
                    case "set":
                        $row_edit['mes_financeiro'] = "Setembro";
                        break;
                    case "out":
                        $row_edit['mes_financeiro'] = "Outubro";
                        break;
                    case "nov":
                        $row_edit['mes_financeiro'] = "Novembro";
                        break;
                    case "dez":
                        $row_edit['mes_financeiro'] = "Dezembro";
                        break;
                    case "":
                        $row_edit['mes_financeiro'] = "Mensal";
                        break;
                }
                echo '<tr id="linha">';
                echo '<td class="valores" id="id_financa">' . $row_edit['id_financeiro'] . '</td>';
                echo '<td class="valores" id="nome_financa">' . $row_edit['nome_financeiro'] . '</td>';
                echo '<td class="valores" id="valor_financa">' . number_format($row_edit['preco_financeiro'],2,",",".") . '</td>';
                echo '<td class="valores" id="mes_financa">' . $row_edit['mes_financeiro'] . '</td>';
                echo '<td class="valores" id="mensal_financa" hidden>' . $row_edit['mensal_financeiro'] . '</td>';
                if ($row_edit['tipo_financeiro'] == 1) {
                    echo '<td class="valores" id="tipo_financa">Ganho</td>';
                } else {
                    echo '<td class="valores" id="tipo_financa">Gasto</td>';
                }
                echo '</tr>';
            }

            ?>

        </table>
        <form id="formEdxValor" action="./includes/adm_financeiroEdit.php" method="POST">
            <div id="hideItens">
                <input type="text" name="idValor" id="inputIdEdit" value="" hidden>
            </div>
            <div id="nomeValor">
                <label for="inputNomeEdit"><b>Nome:</b></label>
                <input type="text" name="nomeEdit" id="inputNomeEdit" value="">
            </div>
            <div id="valorValor">
                <label for="inputValorEdit"><b>Valor:</b></label>
                <input type="text" name="valorEdit" id="inputValorEdit" onKeyUp="mascaraMoeda(this, event)">
            </div>
            <div id="mensal">
                <label for="inputMensalEdit"><b>Mensal:</b></label>
                <input type="checkbox" name="mensal" id="inputMensalEdit">
            </div>
            <div id="mesValor">
                <label for="inputMesEdit"><b>Mês:</b></label>
                <select name="inputMes" id="inputMesEdit">
                    <option value="" disabled selected hidden></option>
                    <option value="jan">Janeiro</option>
                    <option value="fev">Fevereiro</option>
                    <option value="mar">Março</option>
                    <option value="abr">Abril</option>
                    <option value="mai">Maio</option>
                    <option value="jun">Junho</option>
                    <option value="jul">Julho</option>
                    <option value="ago">Agosto</option>
                    <option value="set">Setembro</option>
                    <option value="out">Outubro</option>
                    <option value="nov">Novembro</option>
                    <option value="dez">Dezembro</option>
                </select>
            </div>
            <div id="submitEdxValor">
                <input type="submit" id="btnEdValor" name="btnEdValor" value="Editar valor">
                <input type="submit" id="btnExValor" name="btnEdValor" value="Excluir valor">
                <button id="closeEdxValor" type="button">Cancelar</button>
            </div>
        </form>
    </div>
</dialog>


<script src="./js/selectValor.js"></script>
<script src="./js/graficos.js"></script>
<?php echo "<script>graphLucroValues(" . $_SESSION['id'] . ");graphAvaliaValues(" . $_SESSION['id'] . ");graphAlunosValues(" . $_SESSION['id'] . ")</script>"; ?>
<script src="./js/addGanhoOpenClose.js"></script>
<script src="./js/addGastoOpenClose.js"></script>
<script src="./js/edxValorOpenClose.js"></script>
<script src="./js/menuOpenClose.js"></script>
<?php include_once "includes/modalNotificar.php";
unset($_SESSION['msg']); ?>

</html>