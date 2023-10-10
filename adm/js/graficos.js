
const alunosMensal = document.getElementById('alunosMensal').getContext('2d');
const graficoAlunosMensal = new Chart(alunosMensal, {
    type: 'bar',
    data: {
        labels: meses,
        datasets: [{
                label: 'Alunos novos',
                data: [5, 4, 6, 7, 7, 8],
                tension: 0.3,
                borderColor: '#ef1dac',
                backgroundColor: '#ef1dac'
            },
            {
                label: 'Alunos perdidos',
                data: [1, 1, 2, 3, 4, 5],
                tension: 0.3,
                borderColor: '#e02b20',
                backgroundColor: '#e02b20'
            },
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        elements: {
            point: {
                radius: 0
            }
        },
        scales: {
            y: {
                grid: {
                    color: '#fff',
                },
                ticks: {
                    color: '#fff',
                    callback: function (value, index, values) {
                        return value;
                    },
                    padding: 15,
                    font: {
                        size: 16,
                        family: 'Open Sans',
                    }
                },
                border: {
                    width: 0
                }
            },
            x: {
                grid: {
                    color: 'rgba(255, 255, 255, 0)',
                },
                ticks: {
                    color: '#fff',
                    padding: 15,
                    font: {
                        size: 16,
                        family: 'Open Sans',
                    }
                },
            }
        },
        plugins: {
            legend: {
                labels: {
                    font: {
                        size: 20,
                        family: 'Open Sans',
                    },
                    color: "#fff"
                },

            }
        }
    }
});

const estrelas = ['⭐', '⭐⭐', '⭐⭐⭐', '⭐⭐⭐⭐', '⭐⭐⭐⭐⭐'];
const avaliacoes = document.getElementById('avaliacoes').getContext('2d');

const graficoAvaliacoes = new Chart(avaliacoes, {
    type: 'bar',
    data: {
        labels: estrelas,
        datasets: [{
            label: 'Avaliações',
            data: [15, 14, 16, 17, 17],
            tension: 0.3,
            borderColor: '#fff',
            backgroundColor: '#fff'
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        elements: {
            point: {
                radius: 0
            }
        },
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                grid: {
                    color: '#fff',
                },
                ticks: {
                    color: '#fff',
                    padding: 15,
                    font: {
                        size: 16,
                        family: 'Open Sans',
                    }
                },
                border: {
                    width: 0
                }
            },
            x: {
                grid: {
                    color: 'rgba(255, 255, 255, 0)',
                },
                ticks: {
                    color: '#fff',
                    padding: 15,
                    font: {
                        size: 16,
                        family: 'Open Sans',
                    }
                },
            }
        },
    }
});

function disableInput() {
    const checkMensal = document.getElementById("inputMensal");
    const mesGanho = document.getElementById("inputMes");
    var isChecked = checkMensal.checked;
    if (isChecked) {
        mesGanho.setAttribute('disabled', true);
    } else {
        mesGanho.removeAttribute('disabled');
    }
};

const pesquisa = async (text) => {
    try {
      const response = await fetch("./includes/getValuesGraphic.php", {
        method: "POST",
        body: text,
        headers: {
          "Content-Type": "application/json", // Usando 'application/json' para o cabeçalho
        },
      });
  
      if (response.ok) {
        console.log(response);
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