const openMenu = document.querySelector("#abrirAddGasto");
const closeMenu = document.querySelector("#closeAddGasto");
const modalGasto = document.querySelector("#AddGasto");

openMenu.addEventListener("click", function () {
  document.getElementById("AddGasto").style.display = "flex";
  modalGasto.showModal();
});

closeMenu.addEventListener("click", function () {
    modalGasto.close();
  document.getElementById("AddGasto").style.display = "none";
});

modalGasto.addEventListener("click", (event) => {
  if (event.target === event.currentTarget) {
    event.currentTarget.close();
    document.getElementById("AddGasto").style.display = "none";
  }
});