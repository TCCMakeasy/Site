const openNotify = document.querySelector('#openNotify');
const closeNotify = document.querySelector('#closeNotify');
const notify = document.querySelector('#notificações');	

openNotify.addEventListener('click', function() {
    notify.show();
});

closeNotify.addEventListener('click', function() {
    notify.close();
});