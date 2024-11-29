import {
    RequestProduct
} from "../../../../shared/js/classes/RequestProduct.js";
import Toast from "../../../../shared/js/classes/Toast.js";

const apiProduct = new RequestProduct()
const productForm = document.querySelector("#form-register");
productForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    let productCreate = await apiProduct.createProduct(new FormData(productForm))
    Toast.showToast(productCreate)
});
