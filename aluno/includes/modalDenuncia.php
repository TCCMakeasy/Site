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
                        <option select hidden>Qual o problema?</option>
                        <option value="1">Professor desrespeitoso na aula</option>
                        <option value="2">Conta falsa / Spam</option>
                        <option value="3">Descrição/dados ofensivos</option>
                        <option value="4">Professor não foi profissional</option>
                        <option value="5">Outro</option>
                    </select>
                    <textarea name="comentario" id="comentario" placeholder="Descreva o problema (opcional)" cols="30" rows="1" maxlength="500"></textarea>
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