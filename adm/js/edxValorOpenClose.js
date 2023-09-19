const openMenu = document.querySelector("#abrirEdxValor");
const closeMenu = document.querySelector("#closeEdxValor");
const modalGanho = document.querySelector("#EdxValor");

openMenu.addEventListener("click", function () {
  document.getElementById("EdxValor").style.display = "flex";
  modalValor.showModal();
});

closeMenu.addEventListener("click", function () {
    modalValor.close();
  document.getElementById("EdxValor").style.display = "none";
});

modalValor.addEventListener("click", (event) => {
  if (event.target === event.currentTarget) {
    event.currentTarget.close();
    document.getElementById("EdxValor").style.display = "none";
  }
});