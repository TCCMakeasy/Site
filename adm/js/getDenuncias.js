var searchtimer;

const getDenuncias = async (id) => {
  {
    fetch("./includes/verificaDenuncia.php", {
      method: "POST",
      body: id,
    })
      .then((response) => response.json())
      .then((response) => {
        showDenuncias(response);
      })
      .catch((error) => console.log("Erro: " + error));
  }
};

const inputPesquisa = document.getElementById("pesquisaProfessores");
inputPesquisa.addEventListener("input", (e) => {
  clearTimeout(searchtimer);
  searchtimer = setTimeout(() => {
    let text = e.target.value;
    if (text == "") {
      showDenuncias([]);
    } else {
      getDenuncias(text);
    }
  }, 700);
});

const getName = async (id, tipo) => {
  fetch("./includes/getName.php", {
    method: "POST",
    body: [id, tipo],
  })
    .then((response) => response.text())
    .then((response) => {
      console.log(response);
    })
    .catch((error) => console.log("Erro: " + error));
}

const showDenuncias = (professorDenuncias) => {
  const titleTabela = document.getElementById("titleTabela");
  excluiLinha = document.querySelectorAll("#linha");
  excluiLinha.forEach((element) => {
    element.remove();
  });
  if (professorDenuncias.length == 0) {
    //se quiser add algo quando não tiver denuncias
  } else {
    professorDenuncias.forEach((element) => {
      element.data_alerta = element.data_alerta.split("-");
      element.data_alerta = element.data_alerta[2] + "/" + element.data_alerta[1] + "/" + element.data_alerta[0];
      titleTabela.insertAdjacentHTML(
        "afterend",
        `<tr id="linha">
    <td class="valores nomeDenuncia">${element.id_aluno}</td>
    <td class="valores tipoDenuncia">${element.info_alerta}</td>
    <td class="valores">${element.motivo_alerta}</td>
    <td class="valores">${element.data_alerta}</td>
    <td class="excluir">Excluir</td>
</tr>`
      );
    });
  }
};
