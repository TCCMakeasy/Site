const openFiltro = document.querySelector("#openFiltro");
const closeFiltro = document.querySelector("#closeFiltro");
const filtro = document.querySelector("#filtro");
const decrescenteValor = document.getElementById('valorDecrescente');
const crescenteValor = document.getElementById('valorCrescente');
const decrescenteAvalia = document.getElementById('avaliaDecrescente');
const crescenteAvalia = document.getElementById('avaliaCrescente');

openFiltro.addEventListener("click", function () {
  filtro.showModal();
});

closeFiltro.addEventListener("click", function () {
  filtro.setAttribute("closing", "");
  filtro.addEventListener(
    "animationend",
    () => {
      filtro.removeAttribute("closing");
      filtro.close();
    }, {
      once: true
    }
  );
});

filtro.addEventListener("click", (event) => {
  if (event.target === event.currentTarget) {
    filtro.setAttribute("closing", "");
    filtro.addEventListener(
      "animationend",
      () => {
        filtro.removeAttribute("closing");
        filtro.close();
      }, {
        once: true
      }
    );
  }
});

decrescenteAvalia.addEventListener("click", () => {
  var filtros = []

  if(crescenteValor.checked){
    filtros.push(crescenteValor.id)
  }else if(decrescenteValor.checked){
    filtros.push(decrescenteValor.id)
  }

  if(decrescenteAvalia.checked){
    filtros.push(decrescenteAvalia.id);
    console.log(decrescenteAvalia.id)
  }else if(crescenteAvalia.checked){
    filtros.push(crescenteAvalia.id)
  }

  console.log(filtros)
  atualizarFiltro(filtros);
})

const atualizarFiltro = async (filtros) => {
  try {
    const response = await fetch("./includes/filtro_alunos.php", {
      method: "POST",
      body: filtros,
    });

    if (response.ok) {
      const data = await response.json(); // Aguarde a resolução da promessa JSON
      professores.innerHTML = "";
      if (data.erro) {
        professores.innerHTML = "<h1>Nenhum professor encontrado</h1>";
      } else {
        data.forEach(element => {
          professores.innerHTML += `
                <li class="professor">
                <img src="../fotosPerfil/${element.foto_professor}" alt="Foto do professor" class="imgProfessor">
                <h1 id="nomeProfessor">${element.nome_professor}</h1>
                <a id="saibaMais" href="saibamais.php?id=${element.id_professor}">Saiba Mais</a>
                </li>
                `;
        });
      }

    } else {
      console.error('Erro na solicitação:', response.status, response.statusText);
    }
  } catch (error) {
    console.error('Erro ao processar a solicitação:', error);
  }
}