const btnExcluir = document.querySelector('#btnExcluir');

btnExcluir.addEventListener('click', () => {
    const confirmacao = confirm('Deseja realmente excluir sua conta?');

    if(confirmacao) {
        window.location.href = './includes/excluirConta.php';
    }
});

const confirmEdit = () => {
    return confirm('Tem certeza que quer salvar suas informações?');
}

const showHidePassword = () => {
    if(document.querySelector('#senhaInput').value != '') {
        document.querySelector('#senhaInput').type = document.querySelector('#senhaInput').type === 'password' ? 'text' : 'password';
    document.querySelector('#show-hide').src = document.querySelector('#senhaInput').type === 'password' ? './images/hide.png' : './images/show.png';
    }
    
}