import {getBackendUrl, showToast} from "../../../shared/js/functions.js"
import {RequestUser} from "../../../shared/js/classes/RequestUser.js";
import Toast from "../../../shared/js/classes/Toast.js";

const regForm = document.querySelector("#regForm");
const apiUser = new RequestUser()
regForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    const password = document.getElementById("password").value;
    const passwordConfirmed = document.getElementById("passwordConfirmed").value;

    if (password !== passwordConfirmed) {
        showToast("As duas senhas não coincidem!").then()
    } else {
        let data = new FormData(regForm)
        data.append("role", "DEFAULT")
        let response = await apiUser.createUser(data)
        showToast(`${response.message}!`).then();
        setTimeout(() => {
            window.location.href = getBackendUrl("app");
        }, 3000);
    }
});

const loginForm = document.querySelector("#loginForm");
loginForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    let response = await apiUser.loginUser(new FormData(e.target))
    if (response.type === 'error'){
        showToast(response.message).then(() => {
            window.location.reload();
        })
    }
    if(response.type === "success"){
        localStorage.setItem('session', JSON.stringify(response.data));
        Toast.showToast(response,`Seja Bem Vindo ${response.data.first_name}!`, false);
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