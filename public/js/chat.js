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
    }
}


function getMessages(url){
    const interval = setInterval(() => {
        //console.log(url);

        fetch(url)
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            console.log(data);
        })
        .catch((error) => {
            console.log(error);
        });

    }, 5000);
}