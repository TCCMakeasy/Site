const openFiltro = document.querySelector("#openFiltro");
const closeFiltro = document.querySelector("#closeFiltro");
const filtro = document.querySelector("#filtro");

openFiltro.addEventListener("click", function () {
  filtro.showModal();
});

closeFiltro.addEventListener("click", function () {
  filtro.setAttribute("closing", "");
  filtro.addEventListener(
    "animationend",
    () => {
      filtro.removeAttribute("closing");
      filtro.close();
    },
    { once: true }
  );
});

filtro.addEventListener("click", (event) => {
  if (event.target === event.currentTarget) {
    filtro.setAttribute("closing", "");
    filtro.addEventListener(
      "animationend",
      () => {
        filtro.removeAttribute("closing");
        filtro.close();
      },
      { once: true }
    );
  }
});
