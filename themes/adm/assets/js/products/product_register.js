import {
    getBackendUrlApi,
    showToast
} from "../../../../shared/js/functions.js";
import {
    RequestProduct
} from "../../../../shared/js/classes/RequestProduct.js";

const apiProduct = new RequestProduct()
const productForm = document.querySelector("#form-register");
productForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    let productCreate = await apiProduct.createProduct(new FormData(productForm))
    console.log(productCreate)
    showToast(productCreate.message).then(() => {
        window.location.reload();
    })
});
