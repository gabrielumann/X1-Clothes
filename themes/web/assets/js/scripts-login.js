import {getBackendUrl, getBackendUrlApi, getList, showToast} from "../../../shared/js/functions.js"


const regForm = document.querySelector("#regForm");
regForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    fetch(getBackendUrlApi("users"),{
        method: "POST",
        body: new FormData(regForm)
    }).then((response) => {
        response.json().then((data) => {
            showToast(data.message).then();
        });
    });
});

const loginForm = document.querySelector("#loginForm");
loginForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    let response = await (await fetch(getBackendUrlApi("users/login"), {
        method: "POST",
        body: new FormData(e.target)
    })).json();
    localStorage.setItem('session', JSON.stringify(response.data.token));
    //console.log(JSON.stringify(response.data.token))
    showToast(`Seja Bem Vindo ${response.data.first_name}!`).then();
    if (response.data.role !== "DEFAULT"){
        setTimeout(() => {
            window.location.href = getBackendUrl("adm");
        }, 2000);
    }
    setTimeout(() => {
        window.location.href = getBackendUrl("app");
    }, 3000);
});