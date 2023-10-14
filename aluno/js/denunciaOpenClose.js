const openDenuncia = document.getElementById("report");
const closeDenuncia = document.querySelector("#closeDenuncia");
const denuncia = document.querySelector("#denuncia");

openDenuncia.addEventListener("click", function () {
  denuncia.showModal();
});

closeDenuncia.addEventListener("click", function () {
  denuncia.setAttribute("closing", "");
  denuncia.addEventListener(
    "animationend",
    () => {
      denuncia.removeAttribute("closing");
      denuncia.close();
    },
    { once: true }
  );
});

denuncia.addEventListener("click", (event) => {
  if (event.target === event.currentTarget) {
    denuncia.setAttribute("closing", "");
    denuncia.addEventListener(
      "animationend",
      () => {
        denuncia.removeAttribute("closing");
        denuncia.close();
      },
      { once: true }
    );
  }
});

