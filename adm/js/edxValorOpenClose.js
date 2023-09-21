const openValor = document.querySelector("#abrirEdxValor");
const closeValor = document.querySelector("#closeEdxValor");
const modalValor = document.querySelector("#EdxValor");

openValor.addEventListener("click", function () {
  document.getElementById("EdxValor").style.display = "flex";
  modalValor.showModal();
});

closeValor.addEventListener("click", function () {
    modalValor.close();
  document.getElementById("EdxValor").style.display = "none";
});

modalValor.addEventListener("click", (event) => {
  if (event.target === event.currentTarget) {
    event.currentTarget.close();
    document.getElementById("EdxValor").style.display = "none";
  }
});