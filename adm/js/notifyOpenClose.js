const openNotify = document.querySelector('#openNotify');
const openNotifyMobile = document.querySelector('#openNotifyMobile');
const closeNotify = document.querySelector('#closeNotify');
const notify = document.querySelector('#notificações');	



openNotify.addEventListener('click', function() {
    notify.showModal();
});

openNotifyMobile.addEventListener('click', function() {
    notify.showModal();
});

closeNotify.addEventListener('click', function() {
    notify.close();
});

notify.addEventListener('click', event => {
    if (event.target === event.currentTarget) {
        event.currentTarget.close()
    }
})