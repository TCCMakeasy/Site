const mesesGraphic = [
  "Janeiro",
  "Fevereiro",
  "Março",
  "Abril",
  "Maio",
  "Junho",
];
const estrelas = ["⭐", "⭐⭐", "⭐⭐⭐", "⭐⭐⭐⭐", "⭐⭐⭐⭐⭐"];
const avaliacoesGraph = document.getElementById("avaliacoes").getContext("2d");
const lucroMensal = document.getElementById("lucroMensal").getContext("2d");
const alunosMensal = document.getElementById("alunosMensal").getContext("2d");

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
      console.log(alunos);
      const graficoAlunosMensal = new Chart(alunosMensal, {
        type: "bar",
        data: {
          labels: mesesGraphic,
          datasets: [
            {
              label: "Alunos novos",
              data: [5, 4, 6, 7, 7, 8],
              tension: 0.3,
              borderColor: "#ef1dac",
              backgroundColor: "#ef1dac",
            },
            {
              label: "Alunos perdidos",
              data: [1, 1, 2, 3, 4, 5],
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
      const graficoLucroMensal = new Chart(lucroMensal, {
        type: "line",
        data: {
          labels: mesesGraphic,
          datasets: [
            {
              label: "Ganhos",
              data: [
                ganhosTotais.jan,
                ganhosTotais.fev,
                ganhosTotais.mar,
                ganhosTotais.abr,
                ganhosTotais.mai,
                ganhosTotais.jun,
                ganhosTotais.jul,
                ganhosTotais.ago,
                ganhosTotais.set,
                ganhosTotais.out,
                ganhosTotais.nov,
                ganhosTotais.dez,
              ],
              tension: 0,
              borderColor: "#ef1dac",
              backgroundColor: "#ef1dac",
            },
            {
              label: "Gastos",
              data: [
                gastosTotais.jan,
                gastosTotais.fev,
                gastosTotais.mar,
                gastosTotais.abr,
                gastosTotais.mai,
                gastosTotais.jun,
                gastosTotais.jul,
                gastosTotais.ago,
                gastosTotais.set,
                gastosTotais.out,
                gastosTotais.nov,
                gastosTotais.dez,
              ],
              tension: 0,
              borderColor: "#e02b20",
              backgroundColor: "#e02b20",
            },
            {
              label: "Lucro",
              data: [
                lucroTotal.jan,
                lucroTotal.fev,
                lucroTotal.mar,
                lucroTotal.abr,
                lucroTotal.mai,
                lucroTotal.jun,
                lucroTotal.jul,
                lucroTotal.ago,
                lucroTotal.set,
                lucroTotal.out,
                lucroTotal.nov,
                lucroTotal.dez,
              ],
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
