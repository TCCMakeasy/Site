const tabela = document.getElementById("tabela");
const btnDesmarcar = document.getElementById("desmarcarAula");
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


const desmarcarAula = (aula) => {
  try {
    objetoAJAX = new XMLHttpRequest();
  } catch (e1) {
    try {
      objetoAJAX = new ActiveXObject("Msxm12.XMLHTTP");
    } catch (e2) {
      try {
        objetoAJAX = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (e3) {
        objetoAJAX = false;
      }
    }
  }
  if (objetoAJAX) {
    objetoAJAX.open("POST", "./includes/desmarcarAula.php", true);
    objetoAJAX.setRequestHeader(
      "X-Content-Type-Options",
      "multipart/form-data"
    );
    objetoAJAX.send(aula);
    objetoAJAX.onreadystatechange = function () {
      if (objetoAJAX.readyState == 4) {
        if (objetoAJAX.responseText == "Desmarcado com sucesso") {
          setTimeout(() => {
            tabela.location.reload();
          }, 1000)
        } else {
          console.log("Erro: " + objetoAJAX.responseText);
        }
      }
    };
  }
};

btnDesmarcar.addEventListener("click", function (e) {
    let target = tabela.getElementsByClassName("selecionado")[0].id;
    desmarcarAula(target);
    console.log(target);
  });
