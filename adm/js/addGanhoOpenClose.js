const openMenu = document.querySelector("#abrirAddGanho");
const closeMenu = document.querySelector("#closeAddGanho");
const modalGanho = document.querySelector("#AddGanho");

openMenu.addEventListener("click", function () {
  document.getElementById("AddGanho").style.display = "flex";
  modalGanho.showModal();
});

closeMenu.addEventListener("click", function () {
    modalGanho.close();
  document.getElementById("AddGanho").style.display = "none";
});

modalGanho.addEventListener("click", (event) => {
  if (event.target === event.currentTarget) {
    event.currentTarget.close();
    document.getElementById("AddGanho").style.display = "none";
  }
});