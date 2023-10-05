const openMenu = document.querySelector("#abrirAdicionarProf");
const closeMenu = document.querySelector("#closeAddProf");
const modalProf = document.querySelector("#addProf");

openMenu.addEventListener("click", function () {
  document.getElementById("addProf").style.display = "flex";
  modalProf.showModal();
});

closeMenu.addEventListener("click", function () {
  modalProf.close();
  document.getElementById("addProf").style.display = "none";
});

modalProf.addEventListener("click", (event) => {
  if (event.target === event.currentTarget) {
    event.currentTarget.close();
    document.getElementById("addProf").style.display = "none";
  }
});