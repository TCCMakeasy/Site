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
    notify.setAttribute('closing', '');
    notify.addEventListener('animationend', () =>{
    notify.removeAttribute('closing');
    notify.close();
}, {once: true})});

notify.addEventListener('click', event => {
    if (event.target === event.currentTarget) {
        notify.setAttribute('closing', '');
        notify.addEventListener('animationend', () =>{
        notify.removeAttribute('closing');
        notify.close()}, {once: true});
    }
})