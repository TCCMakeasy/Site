const mesesGraphic = [
  "Janeiro",
  "Fevereiro",
  "Março",
  "Abril",
  "Maio",
  "Junho",
  "Julho",
  "Agosto",
  "Setembro",
  "Outubro",
  "Novembro",
  "Dezembro"
];
const meses = [
  "jan",
  "fev",
  "mar",
  "abr",
  "mai",
  "jun",
  "jul",
  "ago",
  "set",
  "out",
  "nov",
  "dez",
];
const estrelas = ["⭐", "⭐⭐", "⭐⭐⭐", "⭐⭐⭐⭐", "⭐⭐⭐⭐⭐"];
const avaliacoesGraph = document.getElementById("avaliacoes").getContext("2d");
const lucroMensal = document.getElementById("lucroMensal").getContext("2d");
const alunosMensal = document.getElementById("alunosMensal").getContext("2d");
const date = new Date();
const currentMonth = date.getMonth();
const mesesShowGraphic = (arrayMeses) => {
  let array = [];
  for (let mes of arrayMeses) {
    array.push(mes)
  }
  return array;
}
const valoresShowGraphic = (obj) => {
  if (currentMonth == 0 || currentMonth == 1) {
    return [obj[meses[0]], obj[meses[1]], obj[meses[2]], obj[meses[3]], obj[meses[4]], obj[meses[5]]];
  } else if (currentMonth == 11 || currentMonth == 10 || currentMonth == 9) {
    return [obj[meses[6]], obj[meses[7]], obj[meses[8]], obj[meses[9]], obj[meses[10]], obj[meses[11]]];
  } else {
    return [obj[meses[currentMonth - 2]], obj[meses[currentMonth - 1]], obj[meses[currentMonth]], obj[meses[currentMonth + 1]], obj[meses[currentMonth + 2]], obj[meses[currentMonth + 3]]];
  }
}
const alunosShowGraphic = (array) => {
  console.log(array);
  const filteredArray = array.filter(obj => {
    const objMonth = new Date(obj.mensal_armazena).getMonth();
    if(currentMonth == 0 ){
      return  objMonth == currentMonth || objMonth == currentMonth + 1 || objMonth == currentMonth + 2 || objMonth == currentMonth + 3 || objMonth == currentMonth + 4 || objMonth == currentMonth + 5;
    }else if(currentMonth == 1){
      return  objMonth == currentMonth - 1 || objMonth == currentMonth || objMonth == currentMonth + 1 || objMonth == currentMonth + 2 || objMonth == currentMonth + 3 || objMonth == currentMonth + 4;
    }else if(currentMonth == 11){
      return  objMonth == currentMonth - 5 || objMonth == currentMonth - 4 || objMonth == currentMonth - 3 || objMonth == currentMonth - 2 || objMonth == currentMonth - 1 || objMonth == currentMonth;
    }else if(currentMonth == 10){
      return objMonth == currentMonth - 4 || objMonth == currentMonth - 3 || objMonth == currentMonth - 2 || objMonth == currentMonth - 1 || objMonth == currentMonth || objMonth == currentMonth + 1;
    }else{
      return  objMonth == currentMonth - 3 || objMonth == currentMonth - 2 || objMonth == currentMonth - 1 || objMonth == currentMonth || objMonth == currentMonth + 1 || objMonth == currentMonth + 2;}
    });
  
  filteredArray.sort((a, b) => {
    return new Date(a.mensal_armazena) - new Date(b.mensal_armazena);
  });
  console.log(filteredArray);
  return filteredArray;
}


const graphAvaliaValues = async (text) => {
  try {
    const response = await fetch("./includes/getValuesGraphicAval.php", {
      method: "POST",
      body: text,
      headers: {
        "Content-Type": "application/json",
      },
    });

    if (response.ok) {
      const avaliacoes = await response.json();
      let avaliacoesCount = {
        umaStar: 0,
        duasStar: 0,
        tresStar: 0,
        quatroStar: 0,
        cincoStar: 0,
      };
      if (!avaliacoes.erro) {
        for (const obj of avaliacoes) {
          switch (obj.nota_avalia) {
            case "1":
              avaliacoesCount.umaStar += 1;
              break;
            case "2":
              avaliacoesCount.duasStar += 1;
              break;
            case "3":
              avaliacoesCount.tresStar += 1;
              break;
            case "4":
              avaliacoesCount.quatroStar += 1;
              break;
            case "5":
              avaliacoesCount.cincoStar += 1;
              break;
          }
        }
      }

      const graficoAvaliacoes = new Chart(avaliacoesGraph, {
        type: "bar",
        data: {
          labels: estrelas,
          datasets: [
            {
              label: "Avaliações",
              data: [
                avaliacoesCount.umaStar,
                avaliacoesCount.duasStar,
                avaliacoesCount.tresStar,
                avaliacoesCount.quatroStar,
                avaliacoesCount.cincoStar,
              ],
              tension: 0.3,
              borderColor: "#fff",
              backgroundColor: "#fff",
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          elements: {
            point: {
              radius: 0,
            },
          },
          plugins: {
            legend: {
              display: false,
            },
          },
          scales: {
            y: {
              grid: {
                color: "#fff",
              },
              ticks: {
                color: "#fff",
                padding: 15,
                precision: 0,
                font: {
                  size: 16,
                  family: "Open Sans",
                },
              },
              border: {
                width: 0,
              },
            },
            x: {
              grid: {
                color: "rgba(255, 255, 255, 0)",
              },
              ticks: {
                color: "#fff",
                padding: 15,
                font: {
                  size: 16,
                  family: "Open Sans",
                },
              },
            },
          },
        },
      });
    } else {
      console.error(
        "Erro na solicitação:",
        response.status,
        response.statusText
      );
    }
  } catch (error) {
    console.error("Erro ao processar a solicitação:", error);
  }
};

const graphAlunosValues = async (idProfessor) => {
  try {
    const response = await fetch("./includes/getValuesGraphicAlunos.php", {
      method: "POST",
      body: idProfessor,
      headers: {
        "Content-Type": "application/json",
      },
    });

    if (response.ok) {
      const alunos = await response.json();
      let mesesShow = [];
      if (currentMonth == 0 || currentMonth == 1) {
        mesesShow = [mesesGraphic[0], mesesGraphic[1], mesesGraphic[2], mesesGraphic[3], mesesGraphic[4], mesesGraphic[5]];
      } else if (currentMonth == 11 || currentMonth == 10 || currentMonth == 9) {
        mesesShow = [mesesGraphic[6], mesesGraphic[7], mesesGraphic[8], mesesGraphic[9], mesesGraphic[10], mesesGraphic[11]];
      } else {
        mesesShow = [mesesGraphic[currentMonth - 2], mesesGraphic[currentMonth - 1], mesesGraphic[currentMonth], mesesGraphic[currentMonth + 1], mesesGraphic[currentMonth + 2], mesesGraphic[currentMonth + 3]];
      }
      const filteredArray = alunosShowGraphic(alunos);
      const graficoAlunosMensal = new Chart(alunosMensal, {
        type: "bar",
        data: {
          labels: mesesShowGraphic(mesesShow),
          datasets: [
            {
              label: "Alunos novos",
              data: filteredArray.map((obj) => obj.novos_armazena),
              tension: 0.3,
              borderColor: "#ef1dac",
              backgroundColor: "#ef1dac",
            },
            {
              label: "Alunos perdidos",
              data: filteredArray.map((obj) => obj.perdidos_armazena),
              tension: 0.3,
              borderColor: "#e02b20",
              backgroundColor: "#e02b20",
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          elements: {
            point: {
              radius: 0,
            },
          },
          scales: {
            y: {
              grid: {
                color: "#fff",
              },
              ticks: {
                color: "#fff",
                callback: function (value, index, values) {
                  return value;
                },
                padding: 15,
                font: {
                  size: 16,
                  family: "Open Sans",
                },
              },
              border: {
                width: 0,
              },
            },
            x: {
              grid: {
                color: "rgba(255, 255, 255, 0)",
              },
              ticks: {
                color: "#fff",
                padding: 15,
                font: {
                  size: 16,
                  family: "Open Sans",
                },
              },
            },
          },
          plugins: {
            legend: {
              labels: {
                font: {
                  size: 20,
                  family: "Open Sans",
                },
                color: "#fff",
              },
            },
          },
        },
      });
    } else {
      console.error(
        "Erro na solicitação:",
        response.status,
        response.statusText
      );
    }
  } catch (error) {
    console.error("Erro ao processar a solicitação:", error);
  }
};

function disableInput(e) {
  const checkMensal = document.getElementsByClassName("inputMensal")[e];
  const mesGanho = document.getElementById("inputMes" + e);
  var isChecked = checkMensal.checked;
  if (isChecked) {
    mesGanho.setAttribute("disabled", true);
  } else {
    mesGanho.removeAttribute("disabled");
  }
}

const graphLucroValues = async (text) => {
  try {
    const response = await fetch("./includes/getValuesGraphic.php", {
      method: "POST",
      body: text,
      headers: {
        "Content-Type": "application/json",
      },
    });

    if (response.ok) {
      const financeiro = await response.json();
      const ganhos = {};
      const gastos = {};
      const gastosTotais = {};
      const ganhosTotais = {};
      const lucroTotal = {};
      let mesesShow = [];
      for (const mes of meses) {
        gastos[mes] = financeiro.filter(
          (item) => item.tipo_financeiro == 2 && item.mes_financeiro == mes
        );
        ganhos[mes] = financeiro.filter(
          (item) => item.tipo_financeiro == 1 && item.mes_financeiro == mes
        );
        gastosTotais[mes] = gastos[mes].reduce(
          (acc, item) => acc + parseFloat(item.preco_financeiro),
          0
        );
        ganhosTotais[mes] = ganhos[mes].reduce(
          (acc, item) => acc + parseFloat(item.preco_financeiro),
          0
        );
        lucroTotal[mes] = ganhosTotais[mes] - gastosTotais[mes];
      }
      if (currentMonth == 0 || currentMonth == 1) {
        mesesShow = [mesesGraphic[0], mesesGraphic[1], mesesGraphic[2], mesesGraphic[3], mesesGraphic[4], mesesGraphic[5]];
      } else if (currentMonth == 11 || currentMonth == 10 || currentMonth == 9) {
        mesesShow = [mesesGraphic[6], mesesGraphic[7], mesesGraphic[8], mesesGraphic[9], mesesGraphic[10], mesesGraphic[11]];
      } else {
        mesesShow = [mesesGraphic[currentMonth - 2], mesesGraphic[currentMonth - 1], mesesGraphic[currentMonth], mesesGraphic[currentMonth + 1], mesesGraphic[currentMonth + 2], mesesGraphic[currentMonth + 3]];
      }
      const graficoLucroMensal = new Chart(lucroMensal, {
        type: "line",
        data: {
          labels: mesesShowGraphic(mesesShow),
          datasets: [
            {
              label: "Ganhos",
              data: valoresShowGraphic(ganhosTotais),
              tension: 0,
              borderColor: "#ef1dac",
              backgroundColor: "#ef1dac",
            },
            {
              label: "Gastos",
              data: valoresShowGraphic(gastosTotais),
              tension: 0,
              borderColor: "#e02b20",
              backgroundColor: "#e02b20",
            },
            {
              label: "Lucro",
              data: valoresShowGraphic(lucroTotal),
              tension: 0,
              borderColor: "#7cda24",
              backgroundColor: "#7cda24",
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          elements: {
            point: {
              radius: 1,
            },
            line: {
              borderWidth: 4,
              fill: false,
            },
          },
          scales: {
            y: {
              beginAtZero: false,
              grid: {
                color: "#fff",
              },
              ticks: {
                color: "#fff",
                callback: function (value) {
                  return "R$ " + value;
                },
                padding: 15,
                font: {
                  size: 16,
                  family: "Open Sans",
                },
              },
              border: {
                width: 0,
              },
            },
            x: {
              grid: {
                color: "rgba(255, 255, 255, 0)",
              },
              ticks: {
                color: "#fff",
                padding: 15,
                font: {
                  size: 16,
                  family: "Open Sans",
                },
              },
            },
          },
          plugins: {
            legend: {
              labels: {
                font: {
                  size: 20,
                  family: "Open Sans",
                },
                color: "#fff",
              },
            },
          },
        },
      });
    } else {
      console.error(
        "Erro na solicitação:",
        response.status,
        response.statusText
      );
    }
  } catch (error) {
    console.error("Erro ao processar a solicitação:", error);
  }
};
