<link rel="stylesheet" type="text/css" href="./styles/estiloNotificar.css">
<dialog id="notificações">
    <div class="notificações-content">
        <div class="notificações-header">
            <button id="closeNotify" onclick="atualizarNotificacoes(<?php echo $_SESSION['id'] ?>)"><img src="./images/voltarseta.png" alt="Botão para voltar"></button>
        </div>
        <div class="notificações-body">
        </div>
        <div id="divApagarTudo">
            <button id="apagarTudo" onClick="apagarNotify('all')"><svg width="24" height="29" viewBox="0 0 24 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.39687 22.1562H10.3556V7.91293H7.39687V22.1562ZM13.3144 22.1562H16.2731V7.91293H13.3144V22.1562ZM1.47938 28.4866V4.74776H0V1.58259H7.39687V0H16.2731V1.58259H23.67V4.74776H22.1906V28.4866H1.47938Z" fill="black" />
                </svg></button>
        </div>
    </div>
</dialog>
<script>
    const apagarNotify = async (id_notifica) => {
        try {
            const apagar = await fetch('./includes/excluir_msn.php', {
                    method: 'POST',
                    body: id_notifica
                })
                .then((response) => {
                    return response.text();
                })
                .then((data) => {
                    if (data == 200) {
                        if (typeof(id_notifica) == "number") {
                            document.getElementById("notify" + id_notifica).style.display = "none";
                        }else{
                            document.getElementsByClassName("notificações-body")[0].innerHTML = "";
                        }
                    } else {
                        alert("Erro " + data + " ao apagar notificação!");
                    }
                })
        } catch (err) {
            console.log(err);
        }
    }
</script>
<script src="./js/notifyOpenClose.js"></script>