var searchtimer;

const getDenuncias = async (id) => {
  {
    fetch("./includes/verificaDenuncia.php", {
      method: "POST",
      body: id,
    })
      .then((response) => response.json())
      .then(async (response) => {
        showDenuncias(response, id);
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
      showDenuncias([], 0);
    } else {
      getDenuncias(text);
    }
  }, 700);
});

const showDenuncias = async (professorDenuncias, idProfessor) => {
  const tabela = document.getElementById("tabela");
  excluiLinha = document.querySelectorAll("#linha");
  const nomeProfessor = document.getElementById("nomeProfessor");
  nomeProfessor.innerHTML = "";
  excluiLinha.forEach((element) => {
    element.remove();
  });
  if (professorDenuncias.length == 0) {
    //se quiser add algo quando não tiver denuncias
  } else {
    nomeProfessor.innerHTML = await getName(idProfessor, "professor");
    if (professorDenuncias.length > 0) {
      professorDenuncias.forEach(async (element) => {
        nome_aluno = await getName(element.id_aluno, "aluno");
        element.data_alerta = element.data_alerta.split("-");
        element.data_alerta =
          element.data_alerta[2] +
          "/" +
          element.data_alerta[1] +
          "/" +
          element.data_alerta[0];
        console.log(element)
        tabela.insertAdjacentHTML(
          "beforeend",
          `<tr id="linha">
          <th class="valores nomeDenuncia">${nome_aluno} [${element.id_aluno}]</th>
          <td class="valores tipoDenuncia">${element.info_alerta}</td>
          <td class="valores">${element.motivo_alerta}</td>
          <td class="valores">${element.data_alerta}</td>
          <td class="excluir" onclick=excluirDenuncia(${element.id_alerta})>Excluir</td>
          </tr>`
        );
      });
    }
  }
};

const excluirDenuncia = async (idDenuncia) => {
  const response = await fetch("./includes/deleteDenuncia.php",
  {
    method: "POST",
    body: [idDenuncia],
  })
}

const getName = async (id, tipo) => {
  const response = await fetch("./includes/getName.php", {
    method: "POST",
    body: [id, tipo],
  });
  const name = await response.text();
  return name;
};
