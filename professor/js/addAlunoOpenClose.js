const openMenu = document.querySelector('#abrirAdicionarAluno');
const closeMenu = document.querySelector('#closeAddAluno');
const menu = document.querySelector('#addAluno');	

openMenu.addEventListener('click', function() {
    menu.showModal();
});

closeMenu.addEventListener('click', function() {
    menu.close();
});

menu.addEventListener('click', event => {
    if (event.target === event.currentTarget) {
        event.currentTarget.close()
    }
})