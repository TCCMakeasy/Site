const tabela = document.getElementById("tabela");
let trs = Array.from(tabela.getElementsByTagName("tr"));
let ths = Array.from(tabela.getElementsByTagName("th"));

tabela.addEventListener("click", function (e) {
  const target = e.target;
  if (target.nodeName === "Tr") {
    trs.forEach((tr) => {
      tr.classList.remove("selecionado");
    });
    target.classList.add("selecionado");
  }
});