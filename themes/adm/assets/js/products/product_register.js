import {formAppendImages, getBackendUrlApi, showToast} from "../../../../shared/js/functions.js";

const productForm = document.querySelector("#form-register");
productForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    let response = await (await fetch(getBackendUrlApi("/products"), {
        method: "POST",
        body: new FormData(productForm)
    })).json();
    //console.log(response)
    showToast(response.message).then(() => {
        window.location.reload();
    })
});
