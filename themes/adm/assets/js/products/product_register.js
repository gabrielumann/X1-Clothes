import {formAppendImages, getBackendUrlApi, showToast} from "../../../../shared/js/functions.js";
import {validateForm} from "./products.js";

const productForm = document.querySelector("#form-register");
productForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    if (!validateForm()) {
        showToast("Por favor, preencha todos os campos obrigatórios.").then();
        return;
    }
    let principal_images = document.querySelector("#product-image")
    let comp_images = [
        document.querySelector("#comp-image-1"),
        document.querySelector("#comp-image-2"),
        document.querySelector("#comp-image-3"),
        document.querySelector("#comp-image-4"),
    ]
    let Form = new FormData(productForm)
    Form = formAppendImages(Form, principal_images, comp_images);
    let response = await (await fetch(getBackendUrlApi("/products"), {
        method: "POST",
        body: Form
    })).json();
    showToast(response.message).then(() => {
        window.location.reload();
    })
});
