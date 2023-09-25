<link rel="stylesheet" type="text/css" href="./styles/estiloFiltro.css">
<dialog id="filtro">
    <div class="filtro-content">
        <div class="filtro-header">
            <button id="closeFiltro"><img src="./images/voltarseta.png" alt="Botão para voltar"></button>
        </div>
        <div class="filtro-body">
        
            <form method="POST" action="">

            <h2>Valor</h2>
            <input type="radio" name="valor">Crescente</input>
            <input type="radio" name="valor" checked>Decrescente</input>

            <h2>Avaliação</h2>
            <input type="radio" name="avalia">Crescente</input>
            <input type="radio" name="avalia" checked>Decrescente</input>

            <input type="submit"></input>

            </form>

            <?php

            ?>

        </div>
    </div>
</dialog>
<script src="./js/filtroOpenClose.js"></script>