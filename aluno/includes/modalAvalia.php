<link rel="stylesheet" type="text/css" href="./styles/estiloAvalia.css">
<dialog id="avalia">
    <div class="avalia-content">
        <div class="avalia-header">
            <button id="closeAvalia"><img src="./images/voltarseta.png" alt="Botão para voltar"></button>
        </div>
        <div class="avalia-body">
            <div id="infosProfessorAvalia">
                <img src="../fotosPerfil/<?php echo $infosProfessor['foto_professor'] ?>" alt="Imagem do professor">
                <h1 id="nomeAvalia"><?php echo $infosProfessor['nome_professor'] ?></h1>
            </div>
            <h2 id="subtitleAvalia">Avalie o professor</h2>
            <form action="./includes/avalia.php" method="POST">
                <div class="avalia-item">
                    <label for="comentario">Comentário:</label>
                    <textarea name="comentario" id="comentario" placeholder="Descreva sua experiência (opcional)" cols="30" rows="1" maxlength="500" required></textarea>
                </div>
                <div class="rating">
                    <input type="radio" name="rating" id="rating-5" value="5">
                    <label for="rating-5"></label>
                    <input type="radio" name="rating" id="rating-4" value="4">
                    <label for="rating-4"></label>
                    <input type="radio" name="rating" id="rating-3" value="3">
                    <label for="rating-3"></label>
                    <input type="radio" name="rating" id="rating-2" value="2">
                    <label for="rating-2"></label>
                    <input type="radio" name="rating" id="rating-1" value="1">
                    <label for="rating-1"></label>
                </div>
                <div class="avalia-submit">
                    <input type="hidden" name="id_professor" value="<?php echo $idProfessor ?>">
                    <input type="submit" value="Postar">
                </div>
            </form>
        </div>
    </div>
</dialog>
<script src="./js/avaliaOpenClose.js"></script>