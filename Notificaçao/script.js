const unReadMensages = document.querySelectorAll('.unread');
const unReadMensagesCount = document.getElementById('num-of-notif');
const markAll = document.getElementById('mark-as-red');

unReadMensagesCount.innerText = unReadMensages.length;

unReadMensages.forEach((message) => {
    message.addEventListener('click',() => {
        message.classList.remove('unread');
        const newUnreadMensages = document.querySelectorAll('.unread');
        unReadMensagesCount.innerText = newUnreadMensages.length;

    });


});
