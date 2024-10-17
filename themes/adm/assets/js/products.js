import {
    getBackendUrl,
    getBackendUrlApi,
    getList, setAllOptions,
    showDataForm,
    showToast,
    clearForm, clearImages, destroy
} from "../../../shared/js/functions.js";
let ImagesLocalPath = '/X1-Clothes/storage/images/products/';

let tbody = document.querySelector("tbody.products-list")
window.addEventListener("load", async () => {
    tbody.innerHTML = ' ';
    let products = await getList("/products")
    products.forEach((e) => {
        //console.log(e.product_image[0].image)
        tbody.innerHTML += `
            <tr id="${e.id}">
                <td>${e.id}</td>
                <td><img src="${ImagesLocalPath + e.product_image[0].image}" alt="Imagem do Produto" class="produto-img"></td> <!-- Exemplo de imagem -->
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
const updateModal = document.getElementById('updateModal');
const closeUpdateModalBtn = document.querySelector('.close-update-modal');

window.onclick = function(event) {
    if (event.target === updateModal) {
        updateModal.style.display = "none";
    }
}
closeUpdateModalBtn.onclick = function() {
    updateModal.style.display = "none";
}
export function validateForm(position = 0) {
    const name = document.querySelectorAll("#name")[position].value.trim();
    const price = document.querySelectorAll("#price_brl")[position].value.trim();
    const color = document.querySelectorAll("#color")[position].value.trim();
    const category = document.querySelectorAll("#category")[position].value;
    const size = document.querySelectorAll("#size")[position].value;
    const brand = document.querySelectorAll("#brand")[position].value;


    if (!name || !price || !color || !category || !size || !brand === 0) {
        return false;
    }

    return true;
}