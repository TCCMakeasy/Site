const tabela = document.getElementById("tabela");
let trs = Array.from(tabela.getElementsByTagName("tr"));
let tds = Array.from(tabela.getElementsByTagName("td"));

tabela.addEventListener("click", function (e) {
  const target = e.target;
  if (target.nodeName === "TD") {
    trs.forEach((tr) => {
      tr.classList.remove("selecionado");
    });
    target.parentNode.classList.add("selecionado");
    console.log(target.parentNode);
  }
});