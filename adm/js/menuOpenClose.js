function menuShow() {
  const menu = document.getElementById("menu");
  if (menu.getAttribute("open")) {
    menu.removeAttribute("open");
    menu.setAttribute("closing", "true");
  } else {
    menu.setAttribute("open", "true");
    menu.removeAttribute("closing");
  }
}

function retornaTituloResponsivo() {
  var title = document.getElementById("title").textContent;
  return title;
}

var paragrafo = document.getElementById("titleResponsive");
paragrafo.textContent = retornaTituloResponsivo();
