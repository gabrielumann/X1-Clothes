import {formAppendImages, getBackendUrlApi, showToast} from "../../../../shared/js/functions.js";

const brandForm = document.querySelector("#form-register");
brandForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    let Form = new FormData(brandForm)
    let response = await (await fetch(getBackendUrlApi("/products/brands"), {
        method: "POST",
        body: Form
    })).json();
    showToast(response.message).then(() => {
        window.location.reload();
    })
});
