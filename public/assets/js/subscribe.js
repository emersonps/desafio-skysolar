let btn_subscribe = document.querySelector('#btn_subscribe');

btn_subscribe.onclick = function () {
    axios.get('/usuario/list').then((resp) => {
        console.log(resp);
    });
};

