const tabela = document.getElementById("tabela");
const btnDesmarcar = document.getElementById("desmarcarAula");
const btnMarcar = document.getElementById("marcarAula");
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

btnDesmarcar.addEventListener("click", function (e) {
  try {
    var target = tabela.getElementsByClassName("selecionado")[0];
    var aula = target.id;
  } catch (error) {
    alert("Selecione uma aula");
    console.log(error);
    return;
  }
  if (target.innerHTML == "Disponível") {
    alert("Aula vazia não pode ser desmarcada");
    return;
  } else if(target.innerHTML == "Ocupado"){
    alert("Aula de outros alunos não pode ser desmarcada");
    return;
  }
  else if (confirm("Deseja desmarcar a aula?")) {
    desmarcarAula(aula);
  }
});

btnMarcar.addEventListener("click", function (e) {
  try {
    var target = tabela.getElementsByClassName("selecionado")[0];
    var aula = target.id;
  } catch (error) {
    alert("Selecione uma aula");
    console.log(error);
    return;
  }
  if (target.innerHTML == "Disponível") {
    if (confirm("Deseja marcar a aula?")) {
      marcarAula(aula);
    }
  } else {
    alert("Aula ocupada não pode ser marcada");
  }
});

const desmarcarAula = async (aula) => {
  fetch("./includes/desmarcarAula.php", {
    method: "POST",
    body: aula,
  })
    .then((response) => response.text())
    .then((response) => {
      if (response == "1") {
        alert("Professor notificado sobre a desmarcação da aula");
      } else {
        alert("Erro ao desmarcar aula");
      }
    })
    .catch((error) => console.log("Erro: " + error));
};

const marcarAula = async (aula) => {
  fetch("./includes/marcar-aula.php", {
    method: "POST",
    body: aula,
  })
    .then((response) => response.text())
    .then((response) => {
      if (response == "1") {
        alert("Professor notificado sobre a marcação da aula");
      } else {
        alert(response);
      }
    })
    .catch((error) => console.log("Erro: " + error));
}