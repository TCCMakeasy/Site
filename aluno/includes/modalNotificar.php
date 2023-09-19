
<link rel="stylesheet" type="text/css" href="./styles/estiloNotificar.css">
<dialog id="notificações">
    <div class="notificações-content">
        <div class="notificações-header">
            <button id="closeNotify"><img src="./images/voltarseta.png" alt="Botão para voltar"></button>
        </div>
        <div class="notificações-body">
            <div class="notificação">
                <?php
                require_once '../../conexao.php';
                
                $sql="SELECT id_professor FROM alunos INNER JOIN notifica ON id_professor = id_professor";
                ?>
                <p id="notificações-txt">ahjkfhjsadhffids sidjhflsdf dfs sdfdsfsdfs</p>
                <div id="apagarNotificações"><span class="separaItens">|</span>
                    <svg width="24" height="29" viewBox="0 0 24 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.39687 22.1562H10.3556V7.91293H7.39687V22.1562ZM13.3144 22.1562H16.2731V7.91293H13.3144V22.1562ZM1.47938 28.4866V4.74776H0V1.58259H7.39687V0H16.2731V1.58259H23.67V4.74776H22.1906V28.4866H1.47938Z" fill="black" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</dialog>
<script src="./js/notifyOpenClose.js"></script>