const openGanho = document.querySelector("#abrirAddGanho");
const closeGanho = document.querySelector("#closeAddGanho");
const modalGanho = document.querySelector("#AddGanho");

openGanho.addEventListener("click", function () {
  document.getElementById("AddGanho").style.display = "flex";
  modalGanho.showModal();
});

closeGanho.addEventListener("click", function () {
    modalGanho.close();
  document.getElementById("AddGanho").style.display = "none";
});

modalGanho.addEventListener("click", (event) => {
  if (event.target === event.currentTarget) {
    event.currentTarget.close();
    document.getElementById("AddGanho").style.display = "none";
  }
});