const menu = document.getElementById("menu");

function menuShow() {
  if (window.innerWidth <= 768) {
    if (menu.style.display == "flex") {
      menu.setAttribute("closing", "");
      menu.addEventListener(
        "animationend",
        () => {
          menu.removeAttribute("closing");
          menu.style.display = "none";
        },
        { once: true }
      );
    } else {
      menu.setAttribute("open", "");
      menu.style.display = "flex";
      menu.style.zIndex = "99999";
      menu.style.width = "calc(40% + 150px)";
      menu.style.height = "calc(100% - 5rem)";
      menu.style.fontSize = "1.3rem";
    }
  } else {
  }
}

function retornaTituloResponsivo() {
  var title = document.getElementById("title").textContent;
  return title;
}

var paragrafo = document.getElementById("titleResponsive");
paragrafo.textContent = retornaTituloResponsivo();
