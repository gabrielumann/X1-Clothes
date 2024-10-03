import {getBackendUrl, getBackendUrlApi, showToast} from "../../../shared/js/functions.js";


const regForm = document.querySelector("#regForm");
regForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    fetch(getBackendUrlApi("users"),{
        method: "POST",
        body: new FormData(regForm)
    }).then((response) => {
        response.json().then((data) => {
            showToast(data.message);
        });
    });
});

const loginForm = document.querySelector("#loginForm");
loginForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    fetch(getBackendUrlApi("users/login"), {
        method: "POST",
        body: new FormData(loginForm)
    }).then((response) => {
        response.json().then((data) => {
            if (data.type === "error") {
                showToast(data.message);
                return;
            }
            localStorage.setItem("userAuth", JSON.stringify(data.user));
            showToast(`Olá, ${(data.user.first_name)} como vai!`);
            setTimeout(() => {
                window.location.href = getBackendUrl("app");
            }, 3000);
        })
    })
});