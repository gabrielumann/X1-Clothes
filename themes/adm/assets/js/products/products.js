import {
    getBackendUrlApi,
    getList, setAllOptions,
} from "../../../../shared/js/functions.js"
let ImagesLocalPath = '/X1-Clothes/';

let tbody = document.querySelector("tbody#products-list")
window.addEventListener("load", async () => {
    await setAllOptions("/products/category", "#category");
    await setAllOptions("/products/sizes", "#size");
    await setAllOptions("/products/brands", "#brand");

    tbody.innerHTML = ' '
    let {data: products} = await (await fetch(getBackendUrlApi('/products'), {method: "GET"})).json();
    verifyIsArray(products).forEach((e) => {
        setValues(tbody, e)
    })
})

function verifyIsArray(element){
    if (Array.isArray(element)) {
        return element
    }else{
        let array = []
        array.push(element)
        return array
    }
}

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