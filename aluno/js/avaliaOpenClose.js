const openAvalia = document.getElementsByClassName("openAvalia");
const closeAvalia = document.querySelector("#closeAvalia");
const avalia = document.querySelector("#avalia");
var estrelaSelected = "";

Array.from(openAvalia).forEach((e) => {
  e.addEventListener("click", function () {
    avalia.showModal();
    estrelaSelected = e.id;
    selectEstrela(estrelaSelected);
  });
});
closeAvalia.addEventListener("click", function () {
  avalia.setAttribute("closing", "");
  estrelaSelected = "";
  Array.from(openAvalia).forEach((e) => {
    e.checked = false;
  });
  avalia.addEventListener(
    "animationend",
    () => {
      avalia.removeAttribute("closing");
      avalia.close();
    },
    { once: true }
  );
});

avalia.addEventListener("click", (event) => {
  if (event.target === event.currentTarget) {
    avalia.setAttribute("closing", "");
    estrelaSelected = "";
    Array.from(openAvalia).forEach((e) => {
      e.checked = false;
    });
    avalia.addEventListener(
      "animationend",
      () => {
        avalia.removeAttribute("closing");
        avalia.close();
      },
      { once: true }
    );
  }
});

const selectEstrela = (estrela) => {
  switch (estrela) {
    case "estrela-1":
      document.getElementById("rating-1").checked = true;
      break;
    case "estrela-2":
      document.getElementById("rating-2").checked = true;
      break;
    case "estrela-3":
      document.getElementById("rating-3").checked = true;
      break;
    case "estrela-4":
      document.getElementById("rating-4").checked = true;
      break;
    case "estrela-5":
      document.getElementById("rating-5").checked = true;
      break;
  }
};
