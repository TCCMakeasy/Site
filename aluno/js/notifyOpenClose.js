const closeNotify = document.querySelector("#closeNotify");
const notify = document.querySelector("#notificações");

const abrirNotify = (id_aluno) => {
  notify.showModal();
  atualizarNotificacoes(id_aluno);
};


closeNotify.addEventListener("click", function () {
  notify.setAttribute("closing", "");
  notify.addEventListener(
    "animationend",
    () => {
      notify.removeAttribute("closing");
      notify.close();
    },
    { once: true }
  );
});

notify.addEventListener("click", (event) => {
  if (event.target === event.currentTarget) {
    closeNotify.click();
  }
});

const atualizarNotificacoes = async (id_aluno) => {
  const response = await fetch(
    "./includes/atualizarNotificacoes.php?id_aluno=" + id_aluno
  );
  const data = await response.json();
  const notificacoes = document.querySelector(".notificações-body");
  notificacoes.innerHTML = "";
  data.forEach((element) => {
    notificacoes.innerHTML += `
    <div class="notificação" id="notify${element.id_notifica}">
    <p id="notificações-txt">${element.texto_notifica}</p>
    <div id="apagarNotificações" onClick="apagarNotify(${element.id_notifica})"><span class="separaItens">|</span>
    <svg width="24" height="29" viewBox="0 0 24 29" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M7.39687 22.1562H10.3556V7.91293H7.39687V22.1562ZM13.3144 22.1562H16.2731V7.91293H13.3144V22.1562ZM1.47938 28.4866V4.74776H0V1.58259H7.39687V0H16.2731V1.58259H23.67V4.74776H22.1906V28.4866H1.47938Z" fill="black" />
    </svg>
    </div>
    </div>
    `;
  });
};
