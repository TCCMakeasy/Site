<link rel="stylesheet" type="text/css" href="./styles/estiloFiltro.css">
<dialog id="filtro">
    <div class="filtro-content">
        <div class="filtro-header">
            <button id="closeFiltro"><img src="./images/voltarseta.png" alt="Botão para voltar"></button>
        </div>
        <div class="filtro-body">
        
            <form method="POST" action="./includes/filtro_alunos.php" class="filtro_form">

            <h1 class="titulo_filtro">Filtros dos professores</h1>

            <h2>Valor</h2>
            <input type="radio" id="valorCrescente" name="valor" value="Crescente">Crescente</input>
            <input type="radio" id="valorDecrescente" name="valor" checked value="Decrescente">Decrescente</input>

            <h2>Avaliação</h2>
            <input type="radio" id="avaliaCrescente" name="avalia" value="Crescente">Crescente</input>
            <input type="radio" id="avaliaDecrescente" name="avalia" checked value="Decrescente">Decrescente</input>

            </form>

        </div>
    </div>
</dialog>
<script src="./js/filtroProfessores.js"></script>