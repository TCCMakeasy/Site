const tabela = document.getElementById("tabela");
let trs = Array.from(tabela.getElementsByTagName("tr"));
let tds = Array.from(tabela.getElementsByTagName("td"));
let linha;
const inputId = document.getElementById("inputIdEdit");
const inputNome = document.getElementById("inputNomeEdit");
const inputValor = document.getElementById("inputValorEdit");
const inputMes = document.getElementById("inputMesEdit");

tabela.addEventListener("click", function (e) {
  const target = e.target;
  if (target.nodeName === "TD") {
    trs.forEach((tr) => {
      tr.classList.remove("selecionado");
    });
    target.parentNode.classList.add("selecionado");
    linha = target.parentNode;
    tds = Array.from(linha.getElementsByTagName("td"));
    inputId.value = tds[0].innerText;
    inputNome.value = tds[1].innerText;
    inputValor.value = tds[2].innerText;
    switch (tds[3].innerText) {
      case "Janeiro":
        inputMes.value = "jan";
        break;
      case "Fevereiro":
        inputMes.value = "fev";
        break;
      case "Março":
        inputMes.value = "mar";
        break;
      case "Abril":
        inputMes.value = "abr";
        break;
      case "Maio":
        inputMes.value = "mai";
        break;
      case "Junho":
        inputMes.value = "jun";
        break;
      case "Julho":
        inputMes.value = "jul";
        break;
      case "Agosto":
        inputMes.value = "ago";
        break;
      case "Setembro":
        inputMes.value = "set";
        break;
      case "Outubro":
        inputMes.value = "out";
        break;
      case "Novembro":
        inputMes.value = "nov";
        break;
      case "Dezembro":
        inputMes.value = "dez";
        break;
    }
  }
});