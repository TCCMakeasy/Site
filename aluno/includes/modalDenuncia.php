<link rel="stylesheet" type="text/css" href="./styles/estiloDenuncia.css">
<dialog id="denuncia">
    <div class="denuncia-content">
        <div class="denuncia-header">
            <button id="closeDenuncia"><img src="./images/voltarseta.png" alt="Botão para voltar"></button>
        </div>
        <div class="denuncia-body">
            <div id="infosProfessorDenuncia">
                <img src="../fotosPerfil/<?php echo $infosProfessor['foto_professor'] ?>" alt="Imagem do professor">
                <h1 id="nomeDenuncia"><?php echo $infosProfessor['nome_professor'] ?></h1>
            </div>
            <h2 id="subtitleDenuncia">Qual o problema com o professor?</h2>
            <form action="./includes/denuncia.php" method="POST">
                <div class="denuncia-item">
                    <select name="tipoDenuncia" id="selectDenuncia" required>
                        <option>Professor desrespeitoso na aula</option>
                        <option>Conta falsa / Spam</option>
                        <option>Descrição/dados ofensivos</option>
                        <option>Professor não foi profissional</option>
                        <option>Outro</option>
                    </select>
                    <textarea name="comentario" id="comentario" placeholder="Descreva o problema (opcional)" cols="30" rows="1" maxlength="200"></textarea>
                </div>
                <div class="denuncia-submit">
                    <input type="hidden" name="id_professor" value="<?php echo $idProfessor ?>">
                    <input type="submit" value="Postar">
                </div>
            </form>
        </div>
    </div>
</dialog>
<script src="./js/denunciaOpenClose.js"></script>