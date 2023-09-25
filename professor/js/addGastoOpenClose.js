const openGasto = document.querySelector("#abrirAddGasto");
const closeGasto = document.querySelector("#closeAddGasto");
const modalGasto = document.querySelector("#AddGasto");

openGasto.addEventListener("click", function () {
  document.getElementById("AddGasto").style.display = "flex";
  modalGasto.showModal();
});

closeGasto.addEventListener("click", function () {
    modalGasto.close();
  document.getElementById("AddGasto").style.display = "none";
});

modalGasto.addEventListener("click", (event) => {
  if (event.target === event.currentTarget) {
    event.currentTarget.close();
    document.getElementById("AddGasto").style.display = "none";
  }
});