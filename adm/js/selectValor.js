const tabela = document.getElementById("tabela");
let tds = Array.from(tabela.getElementsByTagName("td"));
let ths = Array.from(tabela.getElementsByTagName("th"));

tabela.addEventListener("click", function (e) {
  const target = e.target;
  if (target.nodeName === "TD") {
    tds.forEach((td) => {
      td.classList.remove("selecionado");
    });
    target.classList.add("selecionado");
  }
});