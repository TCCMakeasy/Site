const openMenu = document.querySelector("#abrirMarcarAula");
const closeMenu = document.querySelector("#closeMarcarAula");
const modalAula = document.querySelector("#marAula");

openMenu.addEventListener("click", function () {
  document.getElementById("marAula").style.display = "flex";
  modalAula.showModal();
});

closeMenu.addEventListener("click", function () {
    modalAula.close();
  document.getElementById("marAula").style.display = "none";
});

modalAula.addEventListener("click", (event) => {
  if (event.target === event.currentTarget) {
    event.currentTarget.close();
    document.getElementById("marAula").style.display = "none";
  }
});
