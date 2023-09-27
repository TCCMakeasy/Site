<link rel="stylesheet" type="text/css" href="./styles/estiloFiltro.css">
<dialog id="filtro">
    <div class="filtro-content">
        <div class="filtro-header">
            <button id="closeFiltro"><img src="./images/voltarseta.png" alt="Botão para voltar"></button>
        </div>
        <div class="filtro-body">
        
            <form method="POST" action="./includes/filtro2_alunos.php">

            <h2>Valor</h2>
            <input type="radio" name="valor" value="Crescente">Crescente</input>
            <input type="radio" name="valor" checked value="Decrescente">Decrescente</input>

            <h2>Avaliação</h2>
            <input type="radio" name="avalia" value="Crescente">Crescente</input>
            <input type="radio" name="avalia" checked value="Decrescente">Decrescente</input>

            <input type="submit"></input>

            </form>

        </div>
    </div>
</dialog>
<script src="./js/filtroProfessores.js"></script>