import {
    setAllOptions, verifyIsArray,
} from "../../../../shared/js/functions.js"

import {
    RequestProduct
} from "../../../../shared/js/classes/RequestProduct.js";
import {
    ImagesLocalPath
} from "../../../../shared/js/globals.js";

const apiProduct = new RequestProduct()
let tbody = document.querySelector("tbody#products-list")
window.addEventListener("load", async () => {
    await setAllOptions("/products/category", "#category");
    await setAllOptions("/products/sizes", "#size");
    await setAllOptions("/products/brands", "#brand");

    tbody.innerHTML = ' '
    let {data: products} = await apiProduct.listProducts()
    verifyIsArray(products).forEach((e) => {
        setValues(tbody, e)
    })
})


function setValues(tbody, e){
    let principalImage = null;
    if (e.product_image && typeof e.product_image !== "string") {
        (e.product_image).forEach((e) => {
            if(e.type === 'PRINCIPAL') {
                principalImage = e.image
            }
        })
    }
    tbody.innerHTML += `
            <tr id="${e.id}">
                <td>${e.id}</td>
                <td><img src="${ImagesLocalPath + principalImage}" alt="Imagem do Produto" class="product-img"></td> <!-- Exemplo de imagem -->
                <td>${e.name}</td>
                <td>R$ ${e.price_brl.toFixed(2).toString().replace(".", ",")}</td>
                <td>
                    <button class="edit-btn">Editar</button>
                    <button class="delete-btn">Excluir</button>
                </td>
            </tr>`
}