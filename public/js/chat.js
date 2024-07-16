let message = Array();
let id_user = getIduserSession();
let time = 10000;



getUrl();

function getUrl() {
    let url = window.location.search;

    url = url.replace(/\?/, "");
    url = url.split('&');

    const chat = url[0];
    const user = url[1];

    if ((parseInt(chat.split('=')[1]) > 0) && (parseInt(user.split('=')[1]) > 0)) {
        url = `/getMessages?${chat}&${user}`;
        getMessages(url);
        exibirModalSpinner("show");
    }
}

function getMessages(url) {
    const interval = setInterval(() => {
        fetch(url)
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                if (Array.isArray(data) && data.length >= 0) {
                    verificacao(data);
                    console.log(time);
                }
            })
            .catch((error) => {
                console.log(error);
            });

    }, time);
}

function verificacao(chat) {

    if (Array.isArray(message) && message.length <= 0) {
        message = chat;
        renderMessages(chat);
    }

    if ((Array.isArray(message) && Array.isArray(chat)) && (chat.length > message.length)) {
        renderMessages(chat);
    }
}

function getIduserSession() {
    const url = "/getIdUserSession";

    fetch(url)
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            id_user = data;
        })
        .catch((error) => {
            console.log(error);
        });
}

function renderMessages(messageChat) {
    let container = document.querySelector('.list-group');

    removerFilhos();

    messageChat.forEach(messages => {
        let li = document.createElement('li');
        let msg = document.createTextNode(messages.message);

        if (id_user == messages.id_user) {
            li.classList.add('list-group-item', 'd-flex', 'justify-content-end');
        } else {
            li.classList.add('list-group-item', 'd-flex', 'justify-content-start');
        }

        li.appendChild(msg);
        container.appendChild(li);
    });

    closeModalSpinner();
    scrollBottom();
}

function removerFilhos() {
    let container = document.querySelector('.list-group');
    let elements = container.childNodes;

    for (let i = 0; i < elements.length; i++) {
        let element = elements[i];
        container.removeChild(element);
    }
}

function scrollBottom() {
    const myElement = document.querySelector('.list-group');
    myElement.scrollIntoView({
        behavior: 'smooth'
    });
}