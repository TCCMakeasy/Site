<link rel="stylesheet" type="text/css" href="./styles/estiloNotificar.css">
<dialog id="notificações">
    <div class="notificações-content">
        <div class="notificações-header">
            <button id="closeNotify"><img src="./images/voltarseta.png" alt="Botão para voltar"></button>
        </div>
        <?php
                include_once("../conexao.php");
                $result_notifica = "SELECT * FROM notifica where id_professor = '" . $_SESSION['id'] . "' AND verifica_notifica = '1'";
                $resultado_notify = mysqli_query($sql, $result_notifica);
                while ($row_usuario = mysqli_fetch_assoc($resultado_notify)) {
                    echo '<div class="notificações-body">';
                    echo '<div class="notificação">';
                    echo '<p id="notificações-txt">'.$row_usuario['texto_notifica'].'</p>';
                    echo '<div id="apagarNotificações"><span class="separaItens">|</span>';
                    echo '<svg width="24" height="29" viewBox="0 0 24 29" fill="none" xmlns="http://www.w3.org/2000/svg">';
                    echo '<a href="">';
                    echo '<path d="M7.39687 22.1562H10.3556V7.91293H7.39687V22.1562ZM13.3144 22.1562H16.2731V7.91293H13.3144V22.1562ZM1.47938 28.4866V4.74776H0V1.58259H7.39687V0H16.2731V1.58259H23.67V4.74776H22.1906V28.4866H1.47938Z" fill="black" />';
                    echo '</a>';
                    echo '</svg>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
        ?>
    </div>
</dialog>
<script src="./js/notifyOpenClose.js"></script>