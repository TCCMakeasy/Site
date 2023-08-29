const btnExcluir = document.querySelector('#btnExcluir');

btnExcluir.addEventListener('click', () => {
    const confirmacao = confirm('Deseja realmente excluir sua conta?');

    if(confirmacao) {
        window.location.href = './includes/excluirConta.php';
    }
});