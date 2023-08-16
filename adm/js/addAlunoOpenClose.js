const openMenu = document.querySelector("#abrirAdicionarAluno");
const closeMenu = document.querySelector("#closeAddAluno");
const modalAluno = document.querySelector("#addAluno");

openMenu.addEventListener("click", function () {
  document.getElementById("addAluno").style.display = "flex";
  modalAluno.showModal();
});

closeMenu.addEventListener("click", function () {
  modalAluno.close();
  document.getElementById("addAluno").style.display = "none";
});

modalAluno.addEventListener("click", (event) => {
  if (event.target === event.currentTarget) {
    event.currentTarget.close();
    document.getElementById("addAluno").style.display = "none";
  }
});
