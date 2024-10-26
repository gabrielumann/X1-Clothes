import {formAppendImages, getBackendUrlApi, showToast} from "../../../../shared/js/functions.js";

const userForm = document.querySelector("#form-register");
userForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    let Form = new FormData(userForm)
    let response = await (await fetch(getBackendUrlApi("/users"), {
        method: "POST",
        body: Form
    })).json();
    console.log(response)
    showToast(response.message).then(() => {
        window.location.reload();
    })
});
