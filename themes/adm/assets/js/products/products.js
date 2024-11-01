import {
    getList, setAllOptions,
} from "../../../../shared/js/functions.js"
let ImagesLocalPath = '/X1-Clothes/';

let tbody = document.querySelector("tbody#products-list")
window.addEventListener("load", async () => {
    tbody.innerHTML = ' '
    let products = await getList("/products")
    products.forEach((e) => {
        let principalImage;
        e.product_image.forEach((e) => {
            if(e.type === 'PRINCIPAL') {
                principalImage = e
            }
        })
        //console.log(PrincipalImage.image)
        tbody.innerHTML += `
            <tr id="${e.id}">
                <td>${e.id}</td>
                <td><img src="${ImagesLocalPath + principalImage.image}" alt="Imagem do Produto" class="product-img"></td> <!-- Exemplo de imagem -->
                <td>${e.name}</td>
                <td>R$ ${e.price_brl.toFixed(2).toString().replace(".", ",")}</td>
                <td>
                    <button class="edit-btn">Editar</button>
                    <button class="delete-btn">Excluir</button>
                </td>
            </tr>`
    })

    await setAllOptions("/products/category", "#category");
    await setAllOptions("/products/sizes", "#size");
    await setAllOptions("/products/brands", "#brand");

})
