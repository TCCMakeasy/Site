function menuShow() {
  const menu = document.getElementById("menu");
  if (menu.getAttribute("open")) {
    menu.removeAttribute("open");
    menu.setAttribute("closing", "true"); // Adicionei o valor "true" para o atributo "closing"
  } else {
    menu.setAttribute("open", "true"); // Adicionei o valor "true" para o atributo "open"
    menu.removeAttribute("closing"); // Removi o atributo "closing"
  }
}


function retornaTituloResponsivo() {
  var title = document.getElementById("title").textContent;
  return title;
}

var paragrafo = document.getElementById("titleResponsive");
paragrafo.textContent = retornaTituloResponsivo();
