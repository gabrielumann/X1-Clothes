import {getBackendUrl, getBackendUrlApi, getList, showToast} from "../../../shared/js/functions.js"


const regForm = document.querySelector("#regForm");
regForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    let response = await (await fetch(getBackendUrlApi("/users"), {
        method: "POST",
        body: new FormData(regForm)
    })).json();
    console.log(response)
});

const loginForm = document.querySelector("#loginForm");
loginForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    let response = await (await fetch(getBackendUrlApi("users/login"), {
        method: "POST",
        body: new FormData(e.target)
    })).json();
    if (response.type === 'error'){
        showToast(response.message).then(() => {
            window.location.reload();
        })
    }
    if(response.type === "success"){
        localStorage.setItem('session', JSON.stringify(response.data));
        showToast(`Seja Bem Vindo ${response.data.first_name}!`).then();
        //console.log(response.data.image)
        if (response.data.role !== "DEFAULT"){
            setTimeout(() => {
                window.location.href = getBackendUrl("adm");
            }, 2000);
        }
        setTimeout(() => {
            window.location.href = getBackendUrl("app");
        }, 3000);
    }
});