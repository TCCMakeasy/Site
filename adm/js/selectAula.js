const tabela = document.getElementById("tabela");
const btnDesmarcar = document.getElementById("desmarcarAula");
const btnPrivar = document.getElementById("privarAula");
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
    alert("Horário vazio não pode ser desmarcado");
    return;
  } else if (confirm("Deseja desmarcar o horário?")) {
    desmarcarAula(aula);
  }
});

btnPrivar.addEventListener("click", function (e) {
  try {
    var target = tabela.getElementsByClassName("selecionado")[0];
    var aula = target.id;
  } catch (error) {
    alert("Selecione uma aula");
    console.log(error);
    return;
  }
  if (target.classList.contains("privado")) {
    alert("Aula já é privada");
    return;
  } else {
    privarAula(aula);
  }
});

const desmarcarAula = async (aula) => {
  fetch("./includes/desmarcarAula.php", {
    method: "POST",
    body: aula,
  })
    .then((response) => response.text())
    .then((response) => {
      if (response == "Horário desmarcado com sucesso!") {
        document.getElementById(aula).innerHTML = "Disponível";
        document.getElementById(aula).classList.add("disponivel");
        alert(response);
      } else {
        alert("Erro ao desmarcar horário, tente novamente mais tarde");
      }
    })
    .catch((error) => console.log("Erro: " + error));
};

const privarAula = async (aula) => {
  fetch("./includes/privarAula.php", {
    method: "POST",
    body: aula,
  })
    .then((response) => response.text())
    .then((response) => {
      if (response == "Aula privada com sucesso!") {
        document.getElementById(aula).innerHTML = "";
        document.getElementById(aula).classList.remove("disponivel");
        document.getElementById(aula).classList.add("privado");
      } else {
        alert("Erro ao privar aula, tente novamente mais tarde");
      }
    })
    .catch((error) => console.log("Erro: " + error));
};
